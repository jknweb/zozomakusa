<?php
/**
 * Title: Pied de page
 * Slug: zozomakusa/pied-de-page
 * Categories: zozomakusa, footer
 * Block Types: core/template-part/footer
 * Description: Pied de page sombre : logo, promesse, contact WhatsApp, réseaux et bouton WhatsApp flottant.
 *
 * @package ZozoMakusa
 */

?>
<!-- wp:group {"tagName":"footer","align":"full","className":"zm-pied","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|nappe"}}}},"backgroundColor":"nuit","textColor":"nappe","layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull zm-pied has-nappe-color has-nuit-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"width":"96px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo zozomakusa_img( 'logo.png' ); ?>" alt="<?php esc_attr_e( 'Logo ZozoMakusa Traiteur', 'zozomakusa' ); ?>" style="width:96px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400","lineHeight":"1.3"}},"fontSize":"large","fontFamily":"bodoni"} -->
<p class="has-bodoni-font-family has-large-font-size" style="font-style:italic;font-weight:400;line-height:1.3"><?php esc_html_e( 'Traiteur événementiel : mariages, anniversaires, séminaires, baptêmes et pauses-café d’entreprise.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"textColor":"laiton","fontSize":"large"} -->
<h2 class="wp-block-heading has-laiton-color has-text-color has-large-font-size"><?php esc_html_e( 'Nous écrire', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="#whatsapp"><?php esc_html_e( 'WhatsApp : +243 833 649 217', 'zozomakusa' ); ?></a><br><?php esc_html_e( 'Réponse 24 h sur 24, 7 jours sur 7', 'zozomakusa' ); ?><br><?php esc_html_e( 'Kinshasa, République démocratique du Congo', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"textColor":"laiton","fontSize":"large"} -->
<h2 class="wp-block-heading has-laiton-color has-text-color has-large-font-size"><?php esc_html_e( 'Nos tables en images', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="https://www.instagram.com/zozomakusa/">Instagram @zozomakusa</a><br><a href="https://www.tiktok.com/@zozokndl">TikTok @zozokndl</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}},"backgroundColor":"laiton"} -->
<hr class="wp-block-separator alignwide has-text-color has-laiton-color has-alpha-channel-opacity has-laiton-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--30)"/>
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">© ZozoMakusa. <?php esc_html_e( 'Fondée à Kinshasa par Zozo.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"zm-wa-flottant"} -->
<p class="zm-wa-flottant"><a href="#whatsapp"><?php esc_html_e( 'Devis sur WhatsApp', 'zozomakusa' ); ?></a></p>
<!-- /wp:paragraph --></footer>
<!-- /wp:group -->
