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

function custom_nav_class($classes, $item, $args, $depth)
{
    switch ($depth) {
        case 0:
            $classes[] = 'nav-item';
            break;
        case 1:
            $classes[] = '';
            break;
        case 2:
            $classes[] = 'list-group-item border-0';
            break;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_class', 10, 4);

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Level
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);

        // Add custom classes or attributes based on depth
        if ($depth < 1) {
            $classes = array('sub-menu dropdown-menu', 'depth-' . $depth);
        } else {
            $classes = array('sub-menu list-group list-group-flush border-top border-bottom mt-3', 'depth-' . $depth);
        }

        // $classes = array('sub-menu dropdown-menu', 'depth-' . $depth);
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= "\n$indent<ul$class_names>\n";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'depth-' . $depth;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';


        // Check if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            // Add custom classes or attributes based on depth
            if ($depth > 0) {
                $submenu_elmnt = '';
            } else {
                $submenu_elmnt = '<a class="dropdown-toggle bg-light text-dark d-inline float-end rounded px-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>';
            }
        }

        // Add custom classes or attributes based on depth
        if ($depth == 0) {
            $attributes .= ' class="nav-link d-inline"';
        } elseif ($depth == 1) {
            $attributes .= ' class="dropdown-item d-inline"';
        } else {
            $attributes .= ' class="list-group-item d-inline border-0"';
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>' . $submenu_elmnt;
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

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
