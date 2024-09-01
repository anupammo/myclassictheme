<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="archive-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="archive-title display-5 my-3"><?php printf(__('Search Results for: %s', 'theme-text-domain'), get_search_query()); ?></h1>
                        <?php if (have_posts()) : ?>
                            <ul class="nav flex-column my-4">
                                <?php while (have_posts()) : the_post(); ?>
                                    <li class="post nav-item lead fs-6">
                                        <a class="nav-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div class="entry"><?php the_excerpt(); ?></div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else : ?>
                            <p class="lead my-3">No posts found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>