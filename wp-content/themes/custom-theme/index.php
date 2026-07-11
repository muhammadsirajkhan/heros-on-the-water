<?php
/**
 * Blog posts index (when the front page shows latest posts).
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main hotw-main hotw-inner-page container py-5">
    <?php if (have_posts()) : ?>
        <header class="mb-4">
            <h1 class="hotw-title"><?php esc_html_e('Journal', 'heros-on-the-water'); ?></h1>
            <p class="hotw-prose text-muted mb-0"><?php esc_html_e('News and updates from Heroes on the Water.', 'heros-on-the-water'); ?></p>
        </header>
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article <?php post_class('mb-5 pb-5 border-bottom'); ?> id="post-<?php the_ID(); ?>">
                <h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="hotw-prose text-muted small mb-2"><?php echo esc_html(get_the_date()); ?></div>
                <div class="hotw-prose entry-summary">
                    <?php the_excerpt(); ?>
                </div>
                <a class="hotw-btn-order mt-3 d-inline-flex" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'heros-on-the-water'); ?></a>
            </article>
            <?php
        endwhile;
        the_posts_navigation();
    else :
        ?>
        <p class="hotw-prose"><?php esc_html_e('No posts yet.', 'heros-on-the-water'); ?></p>
    <?php endif; ?>
</main>

<?php
get_footer();
