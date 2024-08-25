<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg bg-body-tertiary" role="navigation">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <!-- <a class="navbar-brand" href="#">
                    <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
                </a> -->
                <?php
                if (function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if (has_custom_logo()) {
                        echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-brand">';
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="logo32x32">';
                        echo '</a>';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                }
                ?>
                <?php
                wp_nav_menu(
                    array(
                        'container_class'      => 'collapse navbar-collapse',
                        'menu_class'           => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'theme_location'       => 'primary',
                    )
                );
                ?>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php bloginfo('name'); ?></h1>
                    <p><?php bloginfo('description'); ?></p>
                </div>
            </div>
        </div>
    </header>