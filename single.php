<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post();
                        // Include the post format-specific template for the content.
                        get_template_part('content', get_post_format());

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                        // Previous/next post navigation.
                        the_post_navigation(array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'theme-text-domain') . '</span> ' .
                                '<span class="screen-reader-text">' . __('Next post:', 'theme-text-domain') . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'theme-text-domain') . '</span> ' .
                                '<span class="screen-reader-text">' . __('Previous post:', 'theme-text-domain') . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ));

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