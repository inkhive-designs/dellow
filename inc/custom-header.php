<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers

 * @package Dellow
 */

function dellow_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'dellow_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/assets/images/lake.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'admin-head-callback'    => 'dellow_admin_header_style',
		'admin-preview-callback' => 'dellow_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'dellow_custom_header_setup' );

if ( ! function_exists( 'dellow_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see dellow_custom_header_setup().
 */
function dellow_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
	</style>
<?php
}
endif; // dellow_admin_header_style

if ( ! function_exists( 'dellow_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see dellow_custom_header_setup().
 */
function dellow_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // dellow_admin_header_image
