<?php
/**
 * Title: Ouverture : la ligne de buffet
 * Slug: zozomakusa/ouverture
 * Categories: zozomakusa, banner
 * Keywords: accueil, hero, bannière, devis
 * Description: Grande photo en forme de cloche, titre, occasions servies et bouton de devis WhatsApp.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

?>
<!-- wp:group {"align":"full","className":"zm-ouverture","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|nappe"}}}},"backgroundColor":"nuit","textColor":"nappe","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull zm-ouverture has-nappe-color has-nuit-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"57%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:57%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-cloche"} -->
<figure class="wp-block-image size-full is-style-cloche"><img src="<?php echo zozomakusa_img( 'zo11-1170.webp' ); ?>" alt="<?php esc_attr_e( 'Ligne de chafing-dishes dorés dressée dans un jardin, fleurs jaunes et bleues sur la table', 'zozomakusa' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Ligne de buffet dressée au jardin, Kinshasa', 'zozomakusa' ); ?></figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Le traiteur de vos fêtes à Kinshasa', 'zozomakusa' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'Mariages, anniversaires, séminaires, baptêmes, pauses-café d’entreprise : Zozo et son équipe cuisinent, dressent la ligne de buffet et servent vos invités.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#whatsapp"><?php esc_html_e( 'Demander un devis sur WhatsApp', 'zozomakusa' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#formules"><?php esc_html_e( 'Voir les formules', 'zozomakusa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"textColor":"laiton","fontSize":"small"} -->
<p class="has-laiton-color has-text-color has-small-font-size"><?php esc_html_e( '+243 833 649 217, réponse 24 h sur 24', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
