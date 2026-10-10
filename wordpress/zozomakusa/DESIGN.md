# ZozoMakusa : plan de design

Plan écrit avec le skill `wordpress-pro-design` avant le code.

## Brief

- **Sujet** : traiteur événementiel à Kinshasa, fondé par Zozo.
- **Public** : familles qui organisent un mariage, un anniversaire, un baptême ; entreprises (séminaires, pauses-café).
- **Action principale** : demander un devis sur WhatsApp (+243 833 649 217, 24 h sur 24).
- **Ton** : fête soignée, généreuse, sans prétention.
- **Élément signature** : la cloche en laiton des chafing-dishes, visible sur presque toutes les photos.

## Palette

| Nom | Hex | Rôle |
|---|---|---|
| Nuit | `#15110c` | fond du logo, en-tête, carte |
| Laiton | `#c99a3b` | boutons, noms des formules (contraste 7,3 sur Nuit) |
| Piment | `#b8371f` | chiffres du déroulé, survol des liens (5,6 sur Nappe) |
| Feuille | `#1d4633` | bandeau d'appel, réceptions au jardin (10,2 avec Nappe) |
| Sauge | `#e6ebe1` | fond de la galerie |
| Nappe | `#fbfaf6` | fond principal, la nappe blanche des buffets |
| Encre | `#2b241c` | texte (14,7 sur Nappe) |

## Typographie

- **Bodoni Moda** (titres) : le contraste d'un menu imprimé ou d'un faire-part de mariage.
- **Figtree** (texte) : lisible sur mobile, chaleureuse sans être ronde.
- Échelle : 15 / 17 / 22 / 40 / 64 / 112 px (fluide).

## Mise en page : « la ligne de buffet »

```
ACCUEIL                                   PAGE
┌──────────────────────────────────┐      ┌─────────────────────┐
│ logo  ZozoMakusa     menu  [Devis]│      │ en-tête nuit        │
├──────────────────────────────────┤      ├─────────────────────┤
│  ╭───cloche───╮   H1             │      │ titre (bande nuit)  │
│  │  photo      │   texte          │      ├─────────────────────┤
│  ╰─────────────╯   [Devis] [Carte]│      │ contenu             │
├──────────────────────────────────┤      └─────────────────────┘
│ occasions (liste à filets) │ cloche │
├──────────── nuit ────────────────┤
│ ╔═ carte ═════════════════════╗  │
│ ║ Silver   texte               ║  │
│ ║ Gold     texte               ║  │
│ ║ Platinum texte               ║  │
│ ╚══════════════════════════════╝  │
├──────────────────────────────────┤
│ 1   2   3   4  (déroulé réel)     │
├──────────── sauge ───────────────┤
│ galerie à étiquettes de plats     │
├──────────── feuille ─────────────┤
│ « Une date, un lieu… »  [WhatsApp]│
└──────────────────────────────────┘
```

## Mouvement

Un seul : à l'ouverture, la cloche se lève sur la photo (désactivé si l'appareil demande moins d'animations).

## Principes

1. Les vraies photos de Zozo d'abord ; aucune illustration ni banque d'images.
2. Chaque section a son propre rythme ; aucune grille de cartes identiques.
3. Les textes disent des choses vérifiables (plats, ville, numéro, horaires), jamais des slogans creux.

## Écarts assumés par rapport au site HTML

Le site HTML utilisait des sur-titres numérotés (01, 02…), des mots de titre en italique doré, des flèches sur
les liens et une palette crème et or : ce sont les marqueurs de design générique que le skill demande d'éviter.
Le thème les remplace par la cloche, la carte de menu et les étiquettes de plats.
