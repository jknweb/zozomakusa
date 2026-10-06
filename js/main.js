/* ==========================================================================
   ZozoMakusa — JavaScript principal (vanilla, sans dépendance)

   Modules :
   1. Configuration (numéro WhatsApp & messages)
   2. Utilitaires WhatsApp
   3. Header (état au scroll)
   4. Menu mobile
   5. Animations au scroll (IntersectionObserver)
   6. Galerie : filtres + lightbox
   7. Slider témoignages
   8. Onglets (menus)
   9. Formulaire de réservation → WhatsApp
   10. Bouton WhatsApp flottant
   11. Divers (année du footer)
   ========================================================================== */
(function () {
  'use strict';

  document.documentElement.classList.add('js');

  /* 1. Configuration ======================================================
     ⚠️ Remplacer WHATSAPP_NUMBER par le numéro au format international,
     chiffres uniquement, sans "+" ni espaces. Exemple : 243XXXXXXXXX
     (WordPress : cette valeur pourra venir d'une option du thème via
     wp_localize_script.) */
  var CONFIG = {
    WHATSAPP_NUMBER: 'WHATSAPP_NUMBER',
    messages: {
      quote: 'Bonjour ZozoMakusa, je souhaite obtenir un devis pour mon événement.',
      book: 'Bonjour ZozoMakusa, je souhaite réserver une prestation. Type d\'événement : [type], Date : [date], Nombre d\'invités : [nombre].'
    }
  };

  /* 2. Utilitaires WhatsApp =============================================== */
  function cleanNumber(n) {
    return String(n || '').replace(/[^\d]/g, '');
  }

  function isNumberConfigured() {
    return cleanNumber(CONFIG.WHATSAPP_NUMBER).length >= 8;
  }

  /** Construit une URL wa.me avec message pré-rempli. */
  function waUrl(message) {
    var number = cleanNumber(CONFIG.WHATSAPP_NUMBER);
    var text = encodeURIComponent(message || CONFIG.messages.quote);
    // Sans numéro configuré, wa.me ouvre le sélecteur de contact avec le message pré-rempli.
    return 'https://wa.me/' + number + '?text=' + text;
  }

  /** Remplace les variables [type], [date], [nombre] du message de réservation. */
  function bookingMessage(data) {
    return CONFIG.messages.book
      .replace('[type]', data.type || 'à préciser')
      .replace('[date]', data.date || 'à préciser')
      .replace('[nombre]', data.guests || 'à préciser');
  }

  /**
   * Tous les éléments [data-wa] deviennent des liens WhatsApp :
   *  data-wa="quote"   → message de devis
   *  data-wa="book"    → message de réservation (variables à préciser)
   *  data-wa-type / data-wa-guests → pré-remplissage partiel du message de réservation
   *  data-wa-message="..." → message personnalisé
   */
  function initWhatsAppLinks() {
    var links = document.querySelectorAll('[data-wa]');
    links.forEach(function (el) {
      var kind = el.getAttribute('data-wa');
      var custom = el.getAttribute('data-wa-message');
      var msg;
      if (custom) {
        msg = custom;
      } else if (kind === 'book') {
        msg = bookingMessage({
          type: el.getAttribute('data-wa-type'),
          date: el.getAttribute('data-wa-date'),
          guests: el.getAttribute('data-wa-guests')
        });
      } else {
        msg = CONFIG.messages.quote;
      }
      el.setAttribute('href', waUrl(msg));
      el.setAttribute('target', '_blank');
      el.setAttribute('rel', 'noopener');
      if (!el.getAttribute('aria-label') && !el.textContent.trim()) {
        el.setAttribute('aria-label', 'Nous écrire sur WhatsApp');
      }
    });

    if (!isNumberConfigured() && window.console) {
      console.info('[ZozoMakusa] Numéro WhatsApp non configuré : remplacez WHATSAPP_NUMBER dans js/main.js.');
    }
  }

  /* 3. Header ============================================================= */
  function initHeader() {
    var header = document.querySelector('.site-header');
    if (!header) return;
    var lastY = window.scrollY;
    var ticking = false;

    function update() {
      var y = window.scrollY;
      header.classList.toggle('is-scrolled', y > 40);
      // Masque le header en descendant, le ré-affiche en remontant (hors menu ouvert)
      var menuOpen = document.body.classList.contains('is-locked');
      header.classList.toggle('is-hidden', !menuOpen && y > 400 && y > lastY + 4);
      if (y < lastY - 4 || y < 400) header.classList.remove('is-hidden');
      lastY = y;
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
    update();
  }

  /* 4. Menu mobile ======================================================== */
  function initMobileMenu() {
    var toggle = document.querySelector('.menu-toggle');
    var menu = document.getElementById('mobile-menu');
    if (!toggle || !menu) return;
    var label = toggle.querySelector('.menu-toggle__text');

    function focusables() {
      return menu.querySelectorAll('a[href], button:not([disabled])');
    }

    function open() {
      toggle.setAttribute('aria-expanded', 'true');
      toggle.setAttribute('aria-label', 'Fermer le menu');
      if (label) label.textContent = 'Fermer';
      menu.classList.add('is-open');
      menu.removeAttribute('inert');
      menu.setAttribute('aria-hidden', 'false');
      document.body.classList.add('is-locked');
      var first = focusables()[0];
      if (first) setTimeout(function () { first.focus(); }, 50);
    }

    function close(returnFocus) {
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'Ouvrir le menu');
      if (label) label.textContent = 'Menu';
      menu.classList.remove('is-open');
      menu.setAttribute('inert', '');
      menu.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('is-locked');
      if (returnFocus) toggle.focus();
    }

    menu.setAttribute('inert', '');
    menu.setAttribute('aria-hidden', 'true');

    toggle.addEventListener('click', function () {
      toggle.getAttribute('aria-expanded') === 'true' ? close(true) : open();
    });

    menu.addEventListener('click', function (e) {
      if (e.target.closest('a')) close(false);
    });

    document.addEventListener('keydown', function (e) {
      if (!menu.classList.contains('is-open')) return;
      if (e.key === 'Escape') close(true);
      // Piège de focus simple entre le bouton et le menu
      if (e.key === 'Tab') {
        var items = Array.prototype.slice.call(focusables());
        items.unshift(toggle);
        var first = items[0];
        var last = items[items.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });

    // Ferme le menu si on repasse en desktop
    var mq = window.matchMedia('(min-width: 1024px)');
    var onChange = function (ev) { if (ev.matches) close(false); };
    if (mq.addEventListener) mq.addEventListener('change', onChange);
    else if (mq.addListener) mq.addListener(onChange);
  }

  /* 5. Animations au scroll =============================================== */
  function initReveal() {
    var els = document.querySelectorAll('.reveal, .reveal-img');
    if (!els.length) return;

    if (!('IntersectionObserver' in window)) {
      els.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    els.forEach(function (el) { io.observe(el); });
  }

  /* 6. Galerie : filtres + lightbox ======================================= */
  function initGalleryFilters() {
    var filters = document.querySelectorAll('[data-filter]');
    if (!filters.length) return;
    var items = document.querySelectorAll('.gallery [data-category]');

    filters.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var cat = btn.getAttribute('data-filter');
        filters.forEach(function (b) {
          var active = b === btn;
          b.classList.toggle('is-active', active);
          b.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
        items.forEach(function (item) {
          var match = cat === 'all' || item.getAttribute('data-category').split(' ').indexOf(cat) !== -1;
          item.classList.toggle('is-hidden', !match);
        });
      });
    });
  }

  function initLightbox() {
    var triggers = document.querySelectorAll('[data-lightbox]');
    if (!triggers.length) return;

    var box = document.createElement('div');
    box.className = 'lightbox';
    box.setAttribute('role', 'dialog');
    box.setAttribute('aria-modal', 'true');
    box.setAttribute('aria-label', 'Visionneuse de photos');
    box.setAttribute('aria-hidden', 'true');
    box.innerHTML =
      '<span class="lightbox__count" aria-live="polite"></span>' +
      '<figure class="lightbox__figure"><img class="lightbox__img" alt=""><figcaption class="lightbox__caption"></figcaption></figure>' +
      '<button class="lightbox__btn lightbox__close" type="button" aria-label="Fermer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 6l12 12M18 6L6 18"/></svg></button>' +
      '<button class="lightbox__btn lightbox__prev" type="button" aria-label="Photo précédente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15 5l-7 7 7 7"/></svg></button>' +
      '<button class="lightbox__btn lightbox__next" type="button" aria-label="Photo suivante"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 5l7 7-7 7"/></svg></button>';
    document.body.appendChild(box);

    var img = box.querySelector('.lightbox__img');
    var cap = box.querySelector('.lightbox__caption');
    var count = box.querySelector('.lightbox__count');
    var list = [];
    var index = 0;
    var lastFocus = null;
    var touchX = null;

    function visibleTriggers() {
      return Array.prototype.filter.call(triggers, function (t) {
        return !t.classList.contains('is-hidden');
      });
    }

    function show(i) {
      index = (i + list.length) % list.length;
      var t = list[index];
      var thumb = t.querySelector('img');
      img.src = t.getAttribute('href') || (thumb && thumb.src);
      img.alt = thumb ? thumb.alt : '';
      cap.textContent = t.getAttribute('data-caption') || '';
      count.textContent = (index + 1) + ' / ' + list.length;
    }

    function open(trigger) {
      list = visibleTriggers();
      lastFocus = trigger;
      show(list.indexOf(trigger));
      box.classList.add('is-open');
      box.setAttribute('aria-hidden', 'false');
      document.body.classList.add('is-locked');
      box.querySelector('.lightbox__close').focus();
    }

    function close() {
      box.classList.remove('is-open');
      box.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('is-locked');
      if (lastFocus) lastFocus.focus();
    }

    triggers.forEach(function (t) {
      t.addEventListener('click', function (e) { e.preventDefault(); open(t); });
    });

    box.querySelector('.lightbox__close').addEventListener('click', close);
    box.querySelector('.lightbox__prev').addEventListener('click', function () { show(index - 1); });
    box.querySelector('.lightbox__next').addEventListener('click', function () { show(index + 1); });
    box.addEventListener('click', function (e) { if (e.target === box) close(); });

    document.addEventListener('keydown', function (e) {
      if (!box.classList.contains('is-open')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') show(index - 1);
      if (e.key === 'ArrowRight') show(index + 1);
      if (e.key === 'Tab') {
        var btns = box.querySelectorAll('button');
        var first = btns[0], last = btns[btns.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });

    // Swipe mobile
    box.addEventListener('touchstart', function (e) { touchX = e.touches[0].clientX; }, { passive: true });
    box.addEventListener('touchend', function (e) {
      if (touchX === null) return;
      var dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > 50) show(index + (dx < 0 ? 1 : -1));
      touchX = null;
    });
  }

  /* 7. Slider témoignages ================================================= */
  function initSliders() {
    document.querySelectorAll('[data-slider]').forEach(function (slider) {
      var track = slider.querySelector('.testimonials__track');
      var prev = slider.querySelector('[data-slider-prev]');
      var next = slider.querySelector('[data-slider-next]');
      var bar = slider.querySelector('.slider-nav__bar');
      if (!track) return;

      function step() {
        var card = track.firstElementChild;
        if (!card) return track.clientWidth;
        var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
        return card.getBoundingClientRect().width + gap;
      }

      function updateBar() {
        if (!bar) return;
        var max = track.scrollWidth - track.clientWidth;
        var ratio = track.clientWidth / track.scrollWidth;
        var progress = max > 0 ? track.scrollLeft / max : 0;
        bar.style.width = (ratio * 100) + '%';
        bar.style.transform = 'translateX(' + (progress * (1 / ratio - 1) * 100) + '%)';
      }

      if (prev) prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
      if (next) next.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: 'smooth' }); });
      track.addEventListener('scroll', updateBar, { passive: true });
      window.addEventListener('resize', updateBar);
      updateBar();
    });
  }

  /* 8. Onglets (navigation entre formules) ================================ */
  function initTabs() {
    document.querySelectorAll('[data-tabs]').forEach(function (nav) {
      var links = nav.querySelectorAll('a[href^="#"]');
      if (!('IntersectionObserver' in window)) return;
      var map = {};
      links.forEach(function (a) {
        var target = document.querySelector(a.getAttribute('href'));
        if (target) map[target.id] = a;
      });
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting && map[entry.target.id]) {
            links.forEach(function (l) { l.classList.remove('is-active'); l.removeAttribute('aria-current'); });
            map[entry.target.id].classList.add('is-active');
            map[entry.target.id].setAttribute('aria-current', 'true');
          }
        });
      }, { rootMargin: '-40% 0px -55% 0px' });
      Object.keys(map).forEach(function (id) { io.observe(document.getElementById(id)); });
    });
  }

  /* 9. Formulaire → WhatsApp ============================================== */
  function formatDate(value) {
    // AAAA-MM-JJ → JJ/MM/AAAA
    var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(value || '');
    return m ? m[3] + '/' + m[2] + '/' + m[1] : value;
  }

  function initBookingForm() {
    var form = document.getElementById('booking-form');
    if (!form) return;
    var preview = document.getElementById('wa-preview-text');

    // Pré-sélection via l'URL : contact.html?type=Mariage&formule=Gold
    var params = new URLSearchParams(window.location.search);
    ['type', 'formule'].forEach(function (key) {
      var val = params.get(key);
      var field = form.elements[key];
      if (val && field) {
        Array.prototype.forEach.call(field.options, function (opt) {
          if (opt.value === val) field.value = val;
        });
      }
    });

    // Date minimale : aujourd'hui
    var dateField = form.elements.date;
    if (dateField) {
      var today = new Date();
      var iso = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().slice(0, 10);
      dateField.setAttribute('min', iso);
    }

    function buildMessage() {
      var f = form.elements;
      var msg = bookingMessage({
        type: f.type.value,
        date: formatDate(f.date.value),
        guests: f.guests.value
      });
      var extras = [];
      if (f.formule && f.formule.value) extras.push('Formule souhaitée : ' + f.formule.value);
      if (f.location && f.location.value.trim()) extras.push('Lieu : ' + f.location.value.trim());
      if (f.name && f.name.value.trim()) extras.push('Nom : ' + f.name.value.trim());
      if (f.message && f.message.value.trim()) extras.push('Précisions : ' + f.message.value.trim());
      if (extras.length) msg += '\n' + extras.join('\n');
      return msg;
    }

    function setError(field, text) {
      var wrap = field.closest('.field');
      var err = wrap && wrap.querySelector('.field__error');
      if (wrap) wrap.classList.toggle('has-error', !!text);
      field.setAttribute('aria-invalid', text ? 'true' : 'false');
      if (err) err.textContent = text || '';
    }

    function validate() {
      var ok = true;
      var f = form.elements;
      var firstInvalid = null;

      [['type', 'Merci de choisir un type d\'événement.'],
       ['date', 'Merci d\'indiquer la date de l\'événement.'],
       ['guests', 'Merci d\'indiquer le nombre d\'invités.']].forEach(function (pair) {
        var field = f[pair[0]];
        var empty = !field.value.trim();
        var invalid = empty || !field.checkValidity();
        var text = empty ? pair[1] : (field.validationMessage || pair[1]);
        setError(field, invalid ? text : '');
        if (invalid) { ok = false; if (!firstInvalid) firstInvalid = field; }
      });

      if (firstInvalid) firstInvalid.focus();
      return ok;
    }

    function updatePreview() {
      if (preview) preview.textContent = buildMessage();
    }

    form.addEventListener('input', function (e) {
      if (e.target.closest('.has-error') && e.target.value) setError(e.target, '');
      updatePreview();
    });
    form.addEventListener('change', updatePreview);
    updatePreview();

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate()) return;
      var url = waUrl(buildMessage());
      var win = window.open(url, '_blank', 'noopener');
      if (!win) window.location.href = url; // bloqueur de pop-up : redirection directe
    });
  }

  /* 10. WhatsApp flottant ================================================= */
  function initFloatingWa() {
    var btn = document.querySelector('.wa-float');
    if (!btn) return;
    var footer = document.querySelector('.site-footer');
    var ticking = false;

    function update() {
      var y = window.scrollY;
      var nearFooter = false;
      if (footer) {
        var top = footer.getBoundingClientRect().top;
        nearFooter = top < window.innerHeight - 40 && window.innerWidth >= 1024;
      }
      btn.classList.toggle('is-visible', y > 160 && !nearFooter);
      ticking = false;
    }
    window.addEventListener('scroll', function () {
      if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
    window.addEventListener('resize', update);
    update();
  }

  /* 11. Divers ============================================================ */
  function initYear() {
    document.querySelectorAll('[data-year]').forEach(function (el) {
      el.textContent = new Date().getFullYear();
    });
  }

  /* Init ================================================================== */
  function init() {
    initWhatsAppLinks();
    initHeader();
    initMobileMenu();
    initReveal();
    initGalleryFilters();
    initLightbox();
    initSliders();
    initTabs();
    initBookingForm();
    initFloatingWa();
    initYear();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Exposé pour un usage éventuel (ex. WordPress, tests)
  window.ZozoMakusa = { config: CONFIG, waUrl: waUrl, bookingMessage: bookingMessage };
})();
