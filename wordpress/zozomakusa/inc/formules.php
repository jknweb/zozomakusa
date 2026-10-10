<?php
/**
 * Formules de la carte, utilisées par les motifs « Formules » et « Carte complète ».
 * Le texte inséré dans une page reste ensuite modifiable dans l'éditeur.
 *
 * @package ZozoMakusa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Données des formules.
 *
 * @return array
 */
function zozomakusa_formules() {
	return array(
		'silver'   => array(
			'nom'      => 'Silver',
			'note'     => '',
			'texte'    => __( 'L’essentiel d’un buffet généreux, équilibré pour régaler tous vos invités.', 'zozomakusa' ),
			'contenu'  => __( 'Entrées au choix, un plat de viande, de légumes ou végétarien, accompagnements, desserts.', 'zozomakusa' ),
		),
		'gold'     => array(
			'nom'      => 'Gold',
			'note'     => __( 'La plus demandée', 'zozomakusa' ),
			'texte'    => __( 'Plus de choix et plus de raffinement, pour les réceptions qui veulent marquer.', 'zozomakusa' ),
			'contenu'  => __( 'Entrées élargies, plats signature viande et poisson, accompagnements variés, buffet de desserts.', 'zozomakusa' ),
		),
		'platinum' => array(
			'nom'      => 'Platinum',
			'note'     => '',
			'texte'    => __( 'L’expérience la plus complète, pour vos plus grands moments.', 'zozomakusa' ),
			'contenu'  => __( 'Entrées raffinées, plats d’exception, accompagnements premium, desserts à l’assiette ou en buffet.', 'zozomakusa' ),
		),
		'cocktail' => array(
			'nom'      => 'Cocktail',
			'note'     => '',
			'texte'    => __( 'Pièces salées et sucrées à partager, pour les vins d’honneur et les soirées debout.', 'zozomakusa' ),
			'contenu'  => __( 'Bouchées salées, verrines, tartelettes et mignardises ; boissons sur demande.', 'zozomakusa' ),
		),
		'petit-dejeuner' => array(
			'nom'      => __( 'Petit-déjeuner', 'zozomakusa' ),
			'note'     => '',
			'texte'    => __( 'Pauses-café et petits-déjeuners d’entreprise, servis à l’heure.', 'zozomakusa' ),
			'contenu'  => __( 'Viennoiseries, boissons chaudes et jus, fruits frais, option salée.', 'zozomakusa' ),
		),
	);
}

/**
 * Affiche une ligne de carte (balisage de blocs) par formule demandée.
 *
 * @param string[] $keys Clés des formules à afficher.
 */
function zozomakusa_formule_rows( $keys ) {
	$formules = zozomakusa_formules();
	foreach ( $keys as $key ) {
		if ( empty( $formules[ $key ] ) ) {
			continue;
		}
		$f = $formules[ $key ];
		?>
<!-- wp:columns {"className":"zm-formule","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns zm-formule" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:column {"width":"34%"} -->
<div class="wp-block-column" style="flex-basis:34%"><!-- wp:heading {"level":3,"className":"zm-formule__nom","textColor":"laiton","fontSize":"xx-large"} -->
<h3 class="wp-block-heading zm-formule__nom has-laiton-color has-text-color has-xx-large-font-size" id="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $f['nom'] ); ?></h3>
<!-- /wp:heading -->
		<?php if ( $f['note'] ) : ?>

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"fontSize":"small","fontFamily":"bodoni"} -->
<p class="has-bodoni-font-family has-small-font-size" style="font-style:italic"><?php echo esc_html( $f['note'] ); ?></p>
<!-- /wp:paragraph -->
		<?php endif; ?>
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php echo esc_html( $f['texte'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $f['contenu'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"zm-prix","fontSize":"small"} -->
<p class="zm-prix has-small-font-size"><?php esc_html_e( 'Tarif par personne et minimum d’invités :', 'zozomakusa' ); ?> <a href="#whatsapp"><?php esc_html_e( 'sur devis WhatsApp', 'zozomakusa' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

		<?php
	}
}
