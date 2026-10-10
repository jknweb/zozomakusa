<?php
/**
 * Title: Carte complète des cinq formules
 * Slug: zozomakusa/carte-complete
 * Categories: zozomakusa, featured
 * Keywords: menu, formules, silver, gold, platinum, tarifs
 * Description: Les cinq formules (Silver, Gold, Platinum, Cocktail, Petit-déjeuner) en carte de menu, pour la page Menus.
 * Viewport Width: 1400
 *
 * @package ZozoMakusa
 */

?>
<!-- wp:group {"metadata":{"name":"Carte complète"},"align":"full","className":"is-style-section-nuit","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-nuit" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"align":"wide","className":"zm-intro","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide zm-intro"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'La carte', 'zozomakusa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Viande, poisson, légumes ou végétarien : chaque formule se compose selon vos goûts et ceux de vos invités.', 'zozomakusa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"is-style-carte","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-carte" style="margin-top:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
<?php zozomakusa_formule_rows( array( 'silver', 'gold', 'platinum', 'cocktail', 'petit-dejeuner' ) ); ?>
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"zm-intro","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide zm-intro"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Une envie particulière, un régime spécifique ou un format hors norme : nous composons votre menu sur mesure.', 'zozomakusa' ); ?> <a href="#whatsapp"><?php esc_html_e( 'En parler sur WhatsApp', 'zozomakusa' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
