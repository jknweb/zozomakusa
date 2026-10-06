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
images/           Photos zo1–zo11 (originaux), logo (logozozo.jpg + logo-zozomakusa.png détouré), favicons, image Open Graph
images/opt/       Versions WebP responsives des photos (640px + pleine largeur), servies via srcset
```

## Direction artistique

- **Palette** : noir profond `#0d0c0b`, ivoire `#f7f2e9`, crème `#eee6d7`, champagne `#c6a466`.
- **Typographies** : *Cormorant Garamond* (titres, italiques en champagne) + *Manrope* (textes).
- **Signature** : losange et filets fins inspirés des motifs textiles d'Afrique centrale, numérotation éditoriale des sections, beaucoup d'espace, grandes images, transitions lentes et discrètes.
- Toutes les couleurs, tailles et espacements sont des variables CSS dans `:root` (`css/style.css`).

## WhatsApp

Dans `js/main.js` :

```js
WHATSAPP_NUMBER: '243833649217',  // format international, chiffres uniquement
```

Numéro configuré : +243 833 649 217 (affiché dans le footer, la page contact et la FAQ).

Messages automatiques :
- Devis (`data-wa="quote"`) : « Bonjour ZozoMakusa, je souhaite obtenir un devis pour mon événement. »
- Réservation (`data-wa="book"` et formulaire de contact) : « Bonjour ZozoMakusa, je souhaite réserver une prestation. Type d'événement : [type], Date : [date], Nombre d'invités : [nombre]. »
  Le formulaire ajoute aussi la formule, le lieu, le nom et les précisions s'ils sont renseignés.
- Message libre : attribut `data-wa-message="..."` (utilisé pour « Devis formule Gold », etc.).
- Pré-remplissage du formulaire par URL : `contact.html?type=Mariage&formule=Gold`.

## Informations de la maison (intégrées)

- Slogan : « Traiteur Événementiel : Mariages, Anniversaires, Séminaires, Baptêmes, Pause café d'Entreprise » (hero, footer, SEO, image Open Graph)
- WhatsApp : +243 833 649 217 · Kinshasa, R.D. Congo · Disponible 24h/24
- Fondatrice : Zozo

## Contenus à fournir (placeholders)

Tous les contenus manquants sont balisés `<span class="ph">[…]</span>` (soulignés en pointillés champagne) :
recherchez `class="ph"` dans les fichiers HTML.

| Élément | Où |
|---|---|
| Email | footer, contact |
| Histoire de la maison et parcours de Zozo | accueil, about |
| Plats, prix par personne, minimum d'invités | accueil, menus |
| Inclus/options (service, matériel, boissons) | services, FAQ |
| Avis clients réels (les textes actuels sont des exemples identifiés) | accueil |
| Domaine définitif (`VOTRE-DOMAINE.com`) | balises canonical / Open Graph |
| Mentions légales, confidentialité | footer |

Éléments repérés publiquement (à confirmer par le client avant publication) : formules Silver, Gold, Platinum, Cocktail et Petit-déjeuner ; prestations mariages, anniversaires, séminaires, baptêmes, pauses-café ; options viande, légumes et végétarien.

### Photos et logo

- Le logo officiel `images/logozozo.jpg` est recadré et détouré dans `images/logo-zozomakusa.png` (header, footer). Il sert aussi pour les favicons et l'image Open Graph.
- Les photos `zo1` à `zo11` remplissent le hero, les prestations, les formules, la galerie (filtres Buffets / Cuisine / Cocktail & desserts / Service), la mosaïque d'accueil et la section réseaux.
- Chaque photo est servie en WebP responsive (`images/opt/zoN-640.webp` + pleine largeur) avec le JPEG d'origine en secours.
- Les photos font ~1170px de large : pour un hero encore plus net sur grand écran, fournir une version ≥ 1920px.

Pour ajouter une photo, déposez-la dans `images/`, créez ses versions WebP dans `images/opt/`, puis :

```html
<img src="images/zo12.jpeg"
     srcset="images/opt/zo12-640.webp 640w, images/opt/zo12-1170.webp 1170w"
     sizes="(min-width: 1024px) 25vw, 100vw" width="1170" height="780" loading="lazy" decoding="async" alt="…">
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
