<?php
/**
 * Title: Page Contact
 * Slug: zozomakusa/page-contact
 * Categories: zozomakusa
 * Post Types: page
 * Block Types: core/post-content
 * Keywords: contact, devis, réservation, page
 * Description: Page de contact : ce qu'il faut préciser, le bouton WhatsApp et les réseaux.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Pour un devis rapide, précisez-nous', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-filets","fontSize":"large"} -->
<ul class="wp-block-list is-style-filets has-large-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'Le type d’événement et sa date', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Le lieu (quartier ou salle)', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Le nombre d’invités', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'La formule envisagée, ou vos envies', 'zozomakusa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#whatsapp"><?php esc_html_e( 'Écrire sur WhatsApp', 'zozomakusa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-section-nuit","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
<div class="wp-block-column is-style-section-nuit" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><a href="#whatsapp">+243 833 649 217</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'WhatsApp, 24 h sur 24 et 7 jours sur 7.', 'zozomakusa' ); ?><br><?php esc_html_e( 'Kinshasa, République démocratique du Congo.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="https://www.instagram.com/zozomakusa/">Instagram @zozomakusa</a><br><a href="https://www.tiktok.com/@zozokndl">TikTok @zozokndl</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
