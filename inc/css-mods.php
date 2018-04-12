<?php
function dellow_custom_css_mods() {
    if ( (function_exists( 'of_get_option' )) && (of_get_option('headcode1', true) != 1) ) {
        echo of_get_option('headcode1', true);
    }
    if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
        echo "<style>".of_get_option('style2', true)."</style>";
    }
    if ( (function_exists( 'of_get_option' )) && (of_get_option('slider_enabled') != 0) ) {
        echo "<script>jQuery(window).load(function() { jQuery('#slider').nivoSlider({effect:'boxRainGrow',pauseTime:4500}); });</script>";
    }
    if ( get_header_image() ) :
        echo "<style>#parallax-bg { background: url('".get_header_image()."') center top repeat-x; }</style>";
    endif;

    if ( is_user_logged_in() ) :
        echo "<style>#site-navigation { margin-top: 30px; }</style>";
    endif;

}
add_action('wp_head', 'dellow_custom_css_mods');