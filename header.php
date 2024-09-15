<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
</head>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-md bg-body-tertiary" role="navigation">
            <div class="container">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                if (has_custom_logo()) {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-brand">';
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="rounded-circle logo48x48">';
                    echo '</a>';
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-brand">Brand</a>';
                }
                ?>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu(
                        array(
                            'container'            => 'ul',
                            'container_class'      => '',
                            'container_id'         => '',
                            'container_aria_label' => '',
                            'menu'                 => '',
                            'menu_class'           => 'navbar-nav ms-auto mb-2 mb-lg-0',
                            'menu_id'              => '',
                            'echo'                 => true,
                            'fallback_cb'          => 'wp_page_menu',
                            'before'               => '',
                            'after'                => '',
                            'link_before'          => '',
                            'link_after'           => '',
                            'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'item_spacing'         => 'preserve',
                            'depth'                => 0,
                            'walker'               => '',
                            'theme_location'       => ''
                        )
                    );
                    ?>
                </div>
        </nav>
        <!-- <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php bloginfo('name'); ?></h1>
                    <p class="text-danger"><?php bloginfo('description'); ?></p>
                </div>
            </div>
        </div> -->
    </header>