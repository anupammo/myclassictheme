<?php get_header(); ?>
<div class="container-fluid">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <!-- page template -->
                        <p class="lead">Front Page</p>
                        <!-- page template -->
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                        else :
                            echo '<p>No content found.</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>