<?php
function dellow_scripts() {
    wp_enqueue_style( 'dellow-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,300' );
    wp_enqueue_style( 'dellow-basic-style', get_stylesheet_uri() );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'dellow-bootstrap-style', get_template_directory_uri()."/assets/bootstrap/css/bootstrap.min.css" );

    wp_enqueue_style( 'dellow-main-style', get_template_directory_uri()."/assets/theme-styles/css/default.css" );

    wp_enqueue_script( 'dellow-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'dellow-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style('dellow-nivo-lightbox', get_template_directory_uri()."/assets/css/nivo-lightbox.css" );

    wp_enqueue_style( 'nivo-skin', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_script('dellow-timeago', get_template_directory_uri() . '/js/jquery.timeago.js' );

    wp_enqueue_script( 'dellow-lightbox-js', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery') );

    wp_enqueue_script( 'hoverIntent' );

    wp_enqueue_script( 'jquery-effects-bounce' );

    wp_enqueue_script( 'dellow-externaljs', get_template_directory_uri() . '/js/external.js' );

    wp_enqueue_script( 'dellow-custom-js', get_template_directory_uri() . '/js/custom.js' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'dellow-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'dellow_scripts' );
