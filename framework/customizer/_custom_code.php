<?php
function dellow_customize_register_custom_code($wp_customize) {
    $wp_customize->add_section('dellow_custom_code', array(
        'title' => __('Custom Code', 'dellow'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('dellow_custom_codeh', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('dellow_custom_codeh', array(
        'section' => 'dellow_custom_code',
        'settings' => 'dellow_custom_codeh',
        'label' => __('Enter Code to be Added in Head', 'dellow'),
        'description' => __('Insert scripts or code before the closing head tag in the document source', 'dellow'),
        'type' => 'textarea'
    ));

    $wp_customize->add_setting('dellow_custom_codef', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('dellow_custom_codef', array(
        'section' => 'dellow_custom_code',
        'settings' => 'dellow_custom_codef',
        'label' => __('Enter Code to be Added in Footer', 'dellow'),
        'description' => __('Insert scripts or code before the closing body tag in the document source', 'dellow'),
        'type' => 'textarea'
    ));

}
add_action('customize_register', 'dellow_customize_register_custom_code');