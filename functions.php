<?php
function myclassictheme_enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'myclassictheme_enqueue_styles' );

function my_custom_scripts() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/custom.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_custom_scripts');
