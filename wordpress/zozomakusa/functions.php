<?php
/**
 * ZozoMakusa : fonctions du thème.
 *
 * @package ZozoMakusa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ZOZOMAKUSA_VERSION', wp_get_theme()->get( 'Version' ) );

require_once get_theme_file_path( 'inc/formules.php' );

/**
 * Numéro WhatsApp au format international, chiffres uniquement.
 * Modifiable sans toucher au code : Réglages › Général › « Numéro WhatsApp ».
 */
function zozomakusa_whatsapp_number() {
	$number = preg_replace( '/\D+/', '', (string) get_option( 'zozomakusa_whatsapp', '243833649217' ) );
	return $number ? $number : '243833649217';
}

/**
 * Lien WhatsApp avec un message prérempli.
 *
 * @param string $message Message proposé au visiteur.
 * @return string URL https://wa.me/…
 */
function zozomakusa_whatsapp_url( $message = '' ) {
	if ( '' === $message ) {
		$message = __( 'Bonjour ZozoMakusa, je souhaite obtenir un devis pour mon événement.', 'zozomakusa' );
	}
	return 'https://wa.me/' . zozomakusa_whatsapp_number() . '?text=' . rawurlencode( $message );
}

/**
 * URL d'une image du thème.
 *
 * @param string $file Nom du fichier dans assets/images.
 * @return string
 */
function zozomakusa_img( $file ) {
	return esc_url( get_theme_file_uri( 'assets/images/' . $file ) );
}

/**
 * Styles de l'éditeur.
 */
function zozomakusa_setup() {
	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'zozomakusa_setup' );

/**
 * Feuille de style du thème (ce que theme.json ne sait pas faire).
 */
function zozomakusa_enqueue() {
	wp_enqueue_style( 'zozomakusa', get_theme_file_uri( 'assets/css/theme.css' ), array(), ZOZOMAKUSA_VERSION );
}
add_action( 'wp_enqueue_scripts', 'zozomakusa_enqueue' );

/**
 * Styles de blocs propres à la maison, choisis dans la barre latérale du bloc.
 */
function zozomakusa_block_styles() {
	register_block_style(
		'core/image',
		array(
			'name'  => 'cloche',
			'label' => __( 'Cloche', 'zozomakusa' ),
		)
	);
	register_block_style(
		'core/gallery',
		array(
			'name'  => 'etiquettes',
			'label' => __( 'Étiquettes de buffet', 'zozomakusa' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'carte',
			'label' => __( 'Carte de menu', 'zozomakusa' ),
		)
	);
	register_block_style(
		'core/list',
		array(
			'name'  => 'filets',
			'label' => __( 'Liste à filets', 'zozomakusa' ),
		)
	);
}
add_action( 'init', 'zozomakusa_block_styles' );

/**
 * Catégorie de motifs.
 */
function zozomakusa_pattern_category() {
	register_block_pattern_category(
		'zozomakusa',
		array( 'label' => __( 'ZozoMakusa', 'zozomakusa' ) )
	);
}
add_action( 'init', 'zozomakusa_pattern_category' );

/**
 * Réglage du numéro WhatsApp dans Réglages › Général.
 */
function zozomakusa_register_settings() {
	register_setting(
		'general',
		'zozomakusa_whatsapp',
		array(
			'type'              => 'string',
			'sanitize_callback' => function ( $value ) {
				return preg_replace( '/\D+/', '', (string) $value );
			},
			'default'           => '243833649217',
		)
	);
	add_settings_field(
		'zozomakusa_whatsapp',
		__( 'Numéro WhatsApp', 'zozomakusa' ),
		function () {
			printf(
				'<input type="text" id="zozomakusa_whatsapp" name="zozomakusa_whatsapp" value="%1$s" class="regular-text" inputmode="numeric"><p class="description">%2$s</p>',
				esc_attr( zozomakusa_whatsapp_number() ),
				esc_html__( 'Format international, chiffres uniquement (exemple : 243833649217). Utilisé par tous les boutons « Devis WhatsApp ».', 'zozomakusa' )
			);
		},
		'general',
		'default',
		array( 'label_for' => 'zozomakusa_whatsapp' )
	);
}
add_action( 'admin_init', 'zozomakusa_register_settings' );

/**
 * Tout lien écrit « #whatsapp » dans l'éditeur devient le lien WhatsApp du réglage.
 * Le client peut ainsi ajouter un bouton de devis n'importe où sans connaître le numéro.
 *
 * @param string $content Contenu HTML rendu.
 * @return string
 */
function zozomakusa_whatsapp_links( $content ) {
	if ( false === strpos( $content, '#whatsapp' ) ) {
		return $content;
	}
	return str_replace( 'href="#whatsapp"', 'href="' . esc_url( zozomakusa_whatsapp_url() ) . '" target="_blank" rel="noopener"', $content );
}
add_filter( 'render_block', 'zozomakusa_whatsapp_links' );

/**
 * À l'activation : si aucun logo n'est défini, installer le logo de la maison
 * dans la médiathèque et l'utiliser (bloc « Logo du site »).
 */
function zozomakusa_install_logo() {
	if ( get_option( 'site_logo' ) || get_theme_mod( 'custom_logo' ) ) {
		return;
	}
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$tmp = wp_tempnam( 'logo-zozomakusa.png' );
	if ( ! $tmp || ! copy( get_theme_file_path( 'assets/images/logo.png' ), $tmp ) ) {
		return;
	}
	$id = media_handle_sideload(
		array(
			'name'     => 'logo-zozomakusa.png',
			'tmp_name' => $tmp,
		),
		0,
		__( 'Logo ZozoMakusa', 'zozomakusa' )
	);
	if ( is_wp_error( $id ) ) {
		wp_delete_file( $tmp );
		return;
	}
	update_option( 'site_logo', $id );
	set_theme_mod( 'custom_logo', $id );
}
add_action( 'after_switch_theme', 'zozomakusa_install_logo' );
