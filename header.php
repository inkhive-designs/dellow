<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dellow
 */
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="parallax-bg"></div>
	  	
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

    <?php  get_template_part('modules/header/top', 'bar'); ?>

    <?php  get_template_part('modules/header/masthead'); ?>

    <?php  get_template_part('modules/navigation/primary', 'menu'); ?>

    <?php if( class_exists('rt_slider') ) {
		 rt_slider::render('/framework/featured-components/slider', 'nivo' );
	} ?>

    <?php get_template_part('modules/navigation/mobile','menu'); ?>

    <div id="content" class="site-content row">
		<div class="container col-md-12">