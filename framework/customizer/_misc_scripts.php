<?php
function dellow_customize_register_misc($wp_customize) {
    //Upgrade to Pro
    $wp_customize->add_section(
        'dellow_sec_pro',
        array(
            'title'     => __('Important Links','dellow'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'dellow_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Dellow_WP_Customize_Upgrade_Control(
            $wp_customize,
            'dellow_pro',
            array(
                'description'	=> '<a class="dellow-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'dellow').'</a>
                                    <a class="dellow-important-links" href="https://inkhive.com/documentation/dellow" target="_blank">'.__('Dellow Documentation', 'dellow').'</a>
                                    <a class="dellow-important-links" href="https://demo.inkhive.com/dellow-plus/" target="_blank">'.__('Dellow Plus Live Demo', 'dellow').'</a>
                                    <a class="dellow-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'dellow').'</a>
                                    <a class="dellow-important-links" href="https://wordpress.org/support/theme/dellow/reviews" target="_blank">'.__('Review Dellow on WordPress', 'dellow').'</a>',
                'section' => 'dellow_sec_pro',
                'settings' => 'dellow_pro',
            )
        )
    );
}
add_action('customize_register', 'dellow_customize_register_misc');