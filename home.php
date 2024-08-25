<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="entry"><?php the_excerpt(); ?></div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>