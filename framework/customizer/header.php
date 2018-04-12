<?php
function dellow_customize_register_header_settings($wp_customize) {
    $wp_customize->get_section('header_image')->panel = 'dellow_header_panel';

    $wp_customize->add_panel('dellow_header_panel', array(
        'title' => __('Header Settings', 'dellow'),
        'priority' => 20,
    ));

    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'dellow' ),
        'priority'   => 30,
        'panel' => 'dellow_header_panel'
    ) );

    function dellow_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }
}
add_action('customize_register', 'dellow_customize_register_header_settings');