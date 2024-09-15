<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found my-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- page template -->
                        <p class="lead">404 Page</p>
                        <!-- page template -->
                        <h1 class="page-title lead fs-2">
                            <span class="d-block text-danger display-2">404</span>
                            <?php esc_html_e('Oops! That page can’t be found.', 'your-theme-textdomain'); ?>
                        </h1>

                        <div class="page-content">
                            <p class="lead my-3"><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'your-theme-textdomain'); ?></p>

                            <?php get_search_form(); ?>

                            <p><a class="btn btn-outline-success rounded px-4 my-4" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Return to homepage', 'your-theme-textdomain'); ?></a></p>
                        </div><!-- .page-content -->
                    </div>
                </div>
            </div>
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>