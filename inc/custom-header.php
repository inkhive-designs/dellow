<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers

 * @package Dellow
 */

function dellow_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'dellow_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/images/lake.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'dellow_header_style',
		'admin-head-callback'    => 'dellow_admin_header_style',
		'admin-preview-callback' => 'dellow_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'dellow_custom_header_setup' );

if ( ! function_exists( 'dellow_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see dellow_custom_header_setup().
 */
function dellow_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // dellow_header_style

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
