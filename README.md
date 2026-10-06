# ZozoMakusa — Site vitrine premium (prototype v1)

Site statique HTML5 / CSS3 / JavaScript vanilla pour **ZozoMakusa**, gastronomie & service événementiel.
Aucun framework, aucune dépendance (hors Google Fonts). Mobile first. Prêt à être converti en thème WordPress.

## Arborescence

```
index.html        Accueil (hero, promesse, maison, prestations, formules, événement, galerie, avis, réseaux, CTA)
about.html        Notre maison (histoire, engagements, philosophie, équipe)
services.html     Prestations (mariages, entreprises, réceptions privées, cocktails, inclus & options)
menus.html        Menus (Silver, Gold, Platinum, Cocktail, Petit-déjeuner + détail par formule)
events.html       Votre événement (types d'événements, déroulé, FAQ)
gallery.html      Réalisations (galerie filtrable + lightbox)
contact.html      Demande de réservation → WhatsApp
css/style.css     Design system complet (tokens, composants, responsive)
js/main.js        WhatsApp, navigation, menu mobile, animations, galerie, slider, formulaire
images/           Favicons, image Open Graph, monogramme provisoire
images/placeholders/  Visuels provisoires (SVG) à remplacer par les vraies photos
```

## Direction artistique

- **Palette** : noir profond `#0d0c0b`, ivoire `#f7f2e9`, crème `#eee6d7`, champagne `#c6a466`.
- **Typographies** : *Cormorant Garamond* (titres, italiques en champagne) + *Manrope* (textes).
- **Signature** : losange et filets fins inspirés des motifs textiles d'Afrique centrale, numérotation éditoriale des sections, beaucoup d'espace, grandes images, transitions lentes et discrètes.
- Toutes les couleurs, tailles et espacements sont des variables CSS dans `:root` (`css/style.css`).

## WhatsApp — à configurer en premier

Dans `js/main.js` :

```js
WHATSAPP_NUMBER: 'WHATSAPP_NUMBER',  // → ex. '243XXXXXXXXX' (format international, chiffres uniquement)
```

Tant que le numéro n'est pas renseigné, les liens ouvrent WhatsApp avec le message pré-rempli mais sans destinataire.

Messages automatiques :
- Devis (`data-wa="quote"`) : « Bonjour ZozoMakusa, je souhaite obtenir un devis pour mon événement. »
- Réservation (`data-wa="book"` et formulaire de contact) : « Bonjour ZozoMakusa, je souhaite réserver une prestation. Type d'événement : [type], Date : [date], Nombre d'invités : [nombre]. »
  Le formulaire ajoute aussi la formule, le lieu, le nom et les précisions s'ils sont renseignés.
- Message libre : attribut `data-wa-message="..."` (utilisé pour « Devis formule Gold », etc.).
- Pré-remplissage du formulaire par URL : `contact.html?type=Mariage&formule=Gold`.

## Contenus à fournir (placeholders)

Tous les contenus manquants sont balisés `<span class="ph">[…]</span>` (soulignés en pointillés champagne) :
recherchez `class="ph"` dans les fichiers HTML.

| Élément | Où |
|---|---|
| Numéro WhatsApp | `js/main.js` + footer + page contact |
| Email, ville/zone d'intervention, horaires | footer, contact, FAQ |
| Histoire de la maison, nom de la fondatrice | accueil, about |
| Plats, prix par personne, minimum d'invités | accueil, menus |
| Inclus/options (service, matériel, boissons) | services, FAQ |
| Avis clients réels (les textes actuels sont des exemples identifiés) | accueil |
| Photos (hero, prestations, menus, galerie, réseaux) | `images/placeholders/*.svg` |
| Logo officiel (le monogramme actuel est provisoire) | header/footer, favicons |
| Domaine définitif (`VOTRE-DOMAINE.com`) | balises canonical / Open Graph |
| Mentions légales, confidentialité | footer |

Éléments repérés publiquement (à confirmer par le client avant publication) : formules Silver, Gold, Platinum, Cocktail et Petit-déjeuner ; prestations mariages, anniversaires, séminaires, baptêmes, pauses-café ; options viande, légumes et végétarien.

### Remplacer les photos

Remplacez chaque `images/placeholders/xxx.svg` par une photo optimisée (WebP/JPG, ~1920px pour le hero, 900–1200px ailleurs) et mettez à jour `src`, `width`, `height`. Pour des images responsives, ajoutez `srcset` + `sizes`, ex. :

```html
<img src="images/mariage-1280.webp"
     srcset="images/mariage-640.webp 640w, images/mariage-1280.webp 1280w, images/mariage-1920.webp 1920w"
     sizes="(min-width: 1024px) 25vw, 100vw" width="1280" height="1600" loading="lazy" decoding="async" alt="…">
```

Le hero accepte une vidéo (code prêt en commentaire dans `index.html`).

## Qualité intégrée

- Navigation sticky (masquée en descendant, réapparaît en remontant), menu mobile plein écran (Échap, piège de focus, `aria-expanded`).
- Animations au scroll via `IntersectionObserver`, désactivées si `prefers-reduced-motion`.
- Galerie masonry filtrable + lightbox (clavier, swipe mobile), slider d'avis en scroll-snap.
- Formulaire accessible (labels, erreurs `aria-live`, champs ≥ 16px pour éviter le zoom iOS, aperçu du message).
- Bouton WhatsApp flottant, lazy loading, dimensions d'images explicites (pas de décalage de mise en page).
- SEO : titres/descriptions uniques, un seul `h1` par page, hiérarchie de titres, canonical, Open Graph, Twitter Card, JSON-LD (FoodEstablishment), favicons.
- Testé à 320, 375, 414, 768, 1024, 1280 et 1440px : aucun défilement horizontal, aucune erreur JavaScript.

## Prévisualiser

```bash
npx serve .          # ou : python3 -m http.server 8080
```

## Conversion WordPress

- Les blocs `<!-- HEADER (WordPress : header.php) -->` et `<!-- FOOTER (WordPress : footer.php) -->` sont identiques sur toutes les pages → `header.php` / `footer.php`.
- Chaque page → un template (`front-page.php`, `page-about.php`, …) ; les cartes (prestations, formules, galerie, avis) se prêtent à des Custom Post Types ou des champs ACF répétables.
- `css/style.css` → `style.css` du thème (ajouter l'en-tête de thème) ; `js/main.js` via `wp_enqueue_script`, avec le numéro WhatsApp passé par `wp_localize_script`.
