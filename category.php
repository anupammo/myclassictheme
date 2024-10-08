<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="archive-header">
            <h1 class="archive-title"><?php single_cat_title(); ?></h1>
            <?php if ( category_description() ) : ?>
                <div class="archive-description"><?php echo category_description(); ?></div>
            <?php endif; ?>
        </header>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry"><?php the_excerpt(); ?></div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
