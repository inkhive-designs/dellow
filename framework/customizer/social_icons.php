<?php
function dellow_customize_register_social($wp_customize) {
    // Social Icons
    $wp_customize->add_section('dellow_social_section', array(
        'title' => __('Social Icons', 'dellow'),
        'priority' => 44,
        'panel'     => 'dellow_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-', 'dellow'),
        'facebook' => __('Facebook', 'dellow'),
        'twitter' => __('Twitter', 'dellow'),
        'google-plus' => __('Google Plus', 'dellow'),
        'instagram' => __('Instagram', 'dellow'),
        'rss' => __('RSS Feeds', 'dellow'),
        'vine' => __('Vine', 'dellow'),
        'vimeo-square' => __('Vimeo', 'dellow'),
        'youtube' => __('Youtube', 'dellow'),
        'flickr' => __('Flickr', 'dellow'),
    );

    $social_count = count($social_networks);

    for ($x = 1; $x <= ($social_count - 3); $x++) :

        $wp_customize->add_setting(
            'dellow_social_' . $x, array(
            'sanitize_callback' => 'dellow_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control('dellow_social_' . $x, array(
            'settings' => 'dellow_social_' . $x,
            'label' => __('Icon ', 'dellow') . $x,
            'section' => 'dellow_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'dellow_social_url' . $x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('dellow_social_url' . $x, array(
            'settings' => 'dellow_social_url' . $x,
            'description' => __('Icon ', 'dellow') . $x . __(' Url', 'dellow'),
            'section' => 'dellow_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function dellow_sanitize_social($input)
    {
        $social_networks = array(
            'none',
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if (in_array($input, $social_networks))
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'dellow_customize_register_social');