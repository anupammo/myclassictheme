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
// 404 page template with custom search
function my_custom_search_form($form)
{
    $form = '
    <form role="search" method="get" class="d-flex search-form custom-class" action="' . esc_url(home_url('/')) . '">
        <label>
            <span class="screen-reader-text">' . _x('Search for:', 'label') . '</span>
        </label>
        <input type="search" class="search-field custom-input-class form-control me-2" placeholder="' . esc_attr_x('Search …', 'placeholder') . '" value="' . get_search_query() . '" name="s" />
        <input type="submit" class="search-submit custom-submit-class btn btn-outline-success" value="' . esc_attr_x('Search', 'submit button') . '" />
    </form>';
    return $form;
}
add_filter('get_search_form', 'my_custom_search_form');

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-children dropdown';


            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $output .= '<li' . $class_names . '>';

            $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
            $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a><ul class="dropdown-menu"><li>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a></li></ul>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        } else {
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $output .= '<li' . $class_names . '>';

            $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
            $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }
}
