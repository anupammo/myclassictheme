<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx( 'One comment on “%2$s”', '%1$s comments on “%2$s”', get_comments_number(), 'comments title', 'theme-text-domain' ),
                number_format_i18n( get_comments_number() ),
                get_the_title()
            );
            ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>
        <?php the_comments_navigation(); ?>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>
