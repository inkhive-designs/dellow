<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Dellow
 */
?>
	</div>
	</div><!-- #content -->

    <?php get_sidebar('footer'); ?>

    <footer id="colophon" class="site-footer row" role="contentinfo">
    	<div class="container">
    	    <?php if ( get_theme_mod('dellow_footer_text', true) == 0 ) { ?>
                <div class="site-info col-md-4 container">
                    <?php printf( __( 'Powered by %1$s.', 'dellow' ), '<a href="'.esc_url("https://inkhive.com/product/dellow").'" rel="nofollow">Dellow Theme</a>' ); ?>
                    <span class="sep"></span>
                </div><!-- .site-info -->
    	    <?php } ?>
    	    	<div id="footertext" class="col-md-7">
                    <?php echo ( get_theme_mod('dellow_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','dellow')) : esc_html( get_theme_mod('dellow_footer_text') ); ?>
                </div>
    	</div>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php		
	if ( (get_theme_mod( 'dellow_custom_codef' ) != '' ) ) {
			 	echo get_theme_mod('dellow_custom_codef'); } ?>
<?php wp_footer(); ?>
</body>
</html>