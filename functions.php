<?php
// Enqueue parent stylesheet
function myclassictheme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'myclassictheme_enqueue_styles');

// Enqueue Bootstrap stylesheet
function myclassictheme_enqueue_bootstrap_v5_3_3_styles()
{
    wp_enqueue_style('bootstrap-5-3-3', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'myclassictheme_enqueue_bootstrap_v5_3_3_styles');

// Enqueue javascript
function myclassictheme_custom_scripts()
{
    // Enqueue Bootstrap JS 
    wp_enqueue_script('bootstrap-5-3-3', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('myclassictheme', get_template_directory_uri() . '/assets/js/myclassictheme.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'myclassictheme_custom_scripts');

function myclassictheme_register_my_menus()
{
    register_nav_menus(
        array(
            'primary'   => __('Primary Menu', 'myclassictheme'),
            'mobile'    => __('Mobile Menu', 'myclassictheme')
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
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'myclassictheme_custom_logo_setup');
