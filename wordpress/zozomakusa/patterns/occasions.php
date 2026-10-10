<?php
/**
 * Title: Occasions servies
 * Slug: zozomakusa/occasions
 * Categories: zozomakusa, services
 * Keywords: prestations, mariage, entreprise, cocktail
 * Description: Liste à filets des occasions servies, avec une photo en cloche.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Ce que nous servons, et pour qui', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Cuisine, matériel de service et équipe en salle : nous adaptons la prestation à votre lieu, votre budget et votre nombre d’invités.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-filets","fontSize":"large"} -->
<ul class="wp-block-list is-style-filets has-large-font-size"><!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Mariages', 'zozomakusa' ); ?></strong> : <?php esc_html_e( 'du vin d’honneur au dîner, une ligne de buffet à la hauteur du jour.', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Anniversaires et baptêmes', 'zozomakusa' ); ?></strong> : <?php esc_html_e( 'chez vous ou en salle, pour vingt ou deux cents invités.', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Séminaires et pauses-café', 'zozomakusa' ); ?></strong> : <?php esc_html_e( 'servis à l’heure, entre deux sessions de travail.', 'zozomakusa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Cocktails', 'zozomakusa' ); ?></strong> : <?php esc_html_e( 'verrines, tartelettes et bouchées à manger debout.', 'zozomakusa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-cloche"} -->
<figure class="wp-block-image size-full is-style-cloche"><img src="<?php echo zozomakusa_img( 'zozo10-720.webp' ); ?>" alt="<?php esc_attr_e( 'Crevettes grillées et quartiers de citron dans un chafing-dish', 'zozomakusa' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Crevettes grillées au citron', 'zozomakusa' ); ?></figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
