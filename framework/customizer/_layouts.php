<?php
function dellow_customize_register_layouts($wp_customize) {
    // Layout and Design
    $wp_customize->get_section('background_image')->panel = 'dellow_design_panel';
    $wp_customize->add_panel( 'dellow_design_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','dellow'),
    ) );

    $wp_customize->add_section(
        'dellow_design_options',
        array(
            'title'     => __('Blog Layout','dellow'),
            'priority'  => 0,
            'panel'     => 'dellow_design_panel'
        )
    );


    $wp_customize->add_setting(
        'dellow_blog_layout',
        array( 'sanitize_callback' => 'dellow_sanitize_blog_layout' )
    );

    function dellow_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','dellow') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'dellow_blog_layout',array(
            'label' => __('Select Layout','dellow'),
            'settings' => 'dellow_blog_layout',
            'section'  => 'dellow_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','dellow'),
                'dellow' => __('Dellow Theme Layout','dellow'),
                'grid_2_column' => __('Grid - 2 Column','dellow'),
            )
        )
    );

    $wp_customize->add_section(
        'dellow_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','dellow'),
            'priority'  => 0,
            'panel'     => 'dellow_design_panel'
        )
    );

    $wp_customize->add_setting(
        'dellow_disable_sidebar',
        array( 'sanitize_callback' => 'dellow_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'dellow_disable_sidebar', array(
            'settings' => 'dellow_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','dellow' ),
            'section'  => 'dellow_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'dellow_disable_sidebar_home',
        array( 'sanitize_callback' => 'dellow_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'dellow_disable_sidebar_home', array(
            'settings' => 'dellow_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','dellow' ),
            'section'  => 'dellow_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'dellow_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'dellow_disable_sidebar_front',
        array( 'sanitize_callback' => 'dellow_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'dellow_disable_sidebar_front', array(
            'settings' => 'dellow_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','dellow' ),
            'section'  => 'dellow_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'dellow_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'dellow_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'dellow_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'dellow_sidebar_width', array(
            'settings' => 'dellow_sidebar_width',
            'label'    => __( 'Sidebar Width','dellow' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','dellow'),
            'section'  => 'dellow_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'dellow_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function dellow_show_sidebar_options($control) {

        $option = $control->manager->get_setting('dellow_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'dellow_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','dellow'),
            'description'	=> __('Enter your Own Copyright Text.','dellow'),
            'priority'		=> 11,
            'panel'			=> 'dellow_design_panel'
        )
    );

    $wp_customize->add_setting(
        'dellow_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'dellow_footer_text',
        array(
            'section' => 'dellow_custom_footer',
            'settings' => 'dellow_footer_text',
            'type' => 'text'
        )
    );

}
add_action('customize_register', 'dellow_customize_register_layouts');