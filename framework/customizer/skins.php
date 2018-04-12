<?php
//Logo Settings
function dellow_customize_register_skins( $wp_customize ) {
    //Replace Header Text Color with, separate colors for Title and Description
    $wp_customize->get_section('colors')->panel = 'dellow_design_panel';
}
add_action( 'customize_register', 'dellow_customize_register_skins' );