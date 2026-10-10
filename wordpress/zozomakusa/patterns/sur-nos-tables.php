<?php
/**
 * Title: Sur nos tables (galerie à étiquettes)
 * Slug: zozomakusa/sur-nos-tables
 * Categories: zozomakusa, gallery
 * Keywords: galerie, photos, réalisations, plats
 * Description: Galerie de plats réellement servis, chaque photo porte une étiquette de buffet.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

$zozomakusa_photos = array(
	array( 'zozo04-1079.webp', __( 'Tomates farcies sur lit de salade', 'zozomakusa' ), __( 'Tomates farcies', 'zozomakusa' ) ),
	array( 'zo2-1080.webp', __( 'Verrines de salade de pâtes alignées sur le buffet', 'zozomakusa' ), __( 'Verrines de pâtes', 'zozomakusa' ) ),
	array( 'zo4-1170.webp', __( 'Plat mijoté aux poivrons et oignons dans un chafing-dish', 'zozomakusa' ), __( 'Mijoté aux poivrons', 'zozomakusa' ) ),
	array( 'zozo05-1079.webp', __( 'Verrines sucrées et tartelettes sur plateaux argentés', 'zozomakusa' ), __( 'Verrines et tartelettes', 'zozomakusa' ) ),
	array( 'zo9-1170.webp', __( 'Présentoir doré de bouchées en verrines', 'zozomakusa' ), __( 'Bouchées du cocktail', 'zozomakusa' ) ),
	array( 'zozo09-720.webp', __( 'Raisins, mangues et melon sur un présentoir', 'zozomakusa' ), __( 'Fruits frais', 'zozomakusa' ) ),
);
?>
<!-- wp:group {"align":"full","className":"is-style-section-sauge","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-sauge" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"align":"wide","className":"zm-intro","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide zm-intro"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Sur nos tables', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Photos prises pendant nos réceptions : les plats tels qu’ils sont servis à vos invités.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:gallery {"columns":3,"linkTo":"none","sizeSlug":"full","align":"wide","className":"is-style-etiquettes"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped is-style-etiquettes">
<?php foreach ( $zozomakusa_photos as $zozomakusa_photo ) : ?>
<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo zozomakusa_img( $zozomakusa_photo[0] ); ?>" alt="<?php echo esc_attr( $zozomakusa_photo[1] ); ?>"/><figcaption class="wp-element-caption"><?php echo esc_html( $zozomakusa_photo[2] ); ?></figcaption></figure>
<!-- /wp:image -->
<?php endforeach; ?>
</figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
