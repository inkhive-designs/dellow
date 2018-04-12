<?php

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/logo_compatibility.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function dellow_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('dellow_disable_sidebar') ) :
        $load_sidebar = false;
    elseif( get_theme_mod('dellow_disable_sidebar_home') && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('dellow_disable_sidebar_front') && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function dellow_primary_class() {
    $sw = esc_html(get_theme_mod('dellow_sidebar_width',4));
    $class = "col-md-".(12-$sw);

    if ( !dellow_load_sidebar() )
        $class = "col-md-12";

    echo $class;
}
add_action('dellow_primary-width', 'dellow_primary_class');

function dellow_secondary_class() {
    $sw = esc_html(get_theme_mod('dellow_sidebar_width',4));
    $class = "col-md-".$sw;

    echo $class;
}
add_action('dellow_secondary-width', 'dellow_secondary_class');


/*
** Function to Get Theme Layout 
*/
function dellow_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('dellow_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('dellow_blog_layout') );
    else :
        get_template_part( $ldir ,'grid');
    endif;
}
add_action('dellow_blog_layout', 'dellow_get_blog_layout');

function dellow_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_page_menu_args', 'dellow_nav_menu_args' );

function dellow_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}