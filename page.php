<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="lead">Page</p>
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post();
                        // Display the content of the page.
                        the_content();

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    // End the loop.
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>