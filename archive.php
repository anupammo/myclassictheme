<?php get_header(); ?>
<div id="content">
    <?php if (have_posts()) : ?>
        <header class="archive-header">
            <h1 class="archive-title">
                <?php
                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author()) {
                    the_post();
                    echo 'Author Archives: ' . get_the_author();
                    rewind_posts();
                } elseif (is_day()) {
                    echo 'Daily Archives: ' . get_the_date();
                } elseif (is_month()) {
                    echo 'Monthly Archives: ' . get_the_date('F Y');
                } elseif (is_year()) {
                    echo 'Yearly Archives: ' . get_the_date('Y');
                } else {
                    echo 'Archives';
                }
                ?>
            </h1>
        </header>
        <!-- page template -->
        <p class="lead">404 Page</p>
        <!-- page template -->
        <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>