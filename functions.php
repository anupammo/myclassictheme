<?php
function myclassictheme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'myclassictheme_enqueue_styles');

function myclassictheme_custom_scripts()
{
    // wp_register_script( 'bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' );
    // wp_enqueue_script( 'bootstrapjs' );
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/custom.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'myclassictheme_custom_scripts');

function myclassictheme_register_my_menus()
{
    register_nav_menus(
        array(
            'primary'   => __( 'Primary Menu', 'myclassictheme' ),
            'mobile'    => __( 'Mobile Menu', 'myclassictheme' )
        )
    );
}
add_action('init', 'myclassictheme_register_my_menus');

// Add custom classes to <li> elements
function myclassictheme_nav_menu_css_class($classes, $item, $args)
{
    // Add your custom class
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'myclassictheme_nav_menu_css_class', 1, 3);

// Add custom classes to <a> elements
function myclassictheme_nav_menu_link_attributes($atts, $item, $args)
{
    // Add your custom class
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'myclassictheme_nav_menu_link_attributes', 1, 3);

function myclassictheme_custom_logo_setup()
{
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'myclassictheme_custom_logo_setup');
