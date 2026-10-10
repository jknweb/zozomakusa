<?php
/**
 * Title: Déroulé d'une commande
 * Slug: zozomakusa/deroule
 * Categories: zozomakusa, about
 * Keywords: étapes, comment ça marche, réservation
 * Description: Les quatre étapes d'une commande, du premier message WhatsApp au jour J.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

$zozomakusa_etapes = array(
	array( __( 'Vous écrivez', 'zozomakusa' ), __( 'Sur WhatsApp : la date, le lieu, le nombre d’invités et vos envies.', 'zozomakusa' ) ),
	array( __( 'Nous proposons', 'zozomakusa' ), __( 'Un menu et un devis adaptés à votre budget, sous 24 heures.', 'zozomakusa' ) ),
	array( __( 'Nous préparons', 'zozomakusa' ), __( 'Menu validé, matériel, horaires de livraison et déroulé du service.', 'zozomakusa' ) ),
	array( __( 'Le jour J', 'zozomakusa' ), __( 'Cuisine, mise en place de la ligne de buffet et service : vous restez avec vos invités.', 'zozomakusa' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"align":"wide"} -->
<h2 class="wp-block-heading alignwide"><?php esc_html_e( 'Comment se passe une commande', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)">
<?php foreach ( $zozomakusa_etapes as $zozomakusa_i => $zozomakusa_etape ) : ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"zm-etape__num"} -->
<p class="zm-etape__num"><?php echo esc_html( (string) ( $zozomakusa_i + 1 ) ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $zozomakusa_etape[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $zozomakusa_etape[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
