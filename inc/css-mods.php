<?php
function dellow_custom_css_mods() {

    if ( get_header_textcolor() ) :
        echo "<style>.site-title a,	.site-description { color: #".get_header_textcolor()."; }</style>";
    endif;

    if ( !display_header_text() ) :
        echo "<style>#masthead .site-branding #text-title-desc { display: none; }</style>";
    endif;

    if ( get_header_image() ) :
        echo "<style>#parallax-bg { background: url('".get_header_image()."') center top repeat-x; }</style>";
    endif;

    if ( is_user_logged_in() ) :
        echo "<style>#site-navigation { margin-top: 30px; }</style>";
    endif;

}
add_action('wp_head', 'dellow_custom_css_mods');