<?php
/**
 * Blog posts index (when the front page shows latest posts).
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main oven-main oven-inner-page container py-5">
    <?php if (have_posts()) : ?>
        <header class="mb-4">
            <h1 class="oven-title"><?php esc_html_e('Journal', 'the-black-door-oven'); ?></h1>
            <p class="oven-prose text-muted mb-0"><?php esc_html_e('News and updates from the pizzeria.', 'the-black-door-oven'); ?></p>
        </header>
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article <?php post_class('mb-5 pb-5 border-bottom'); ?> id="post-<?php the_ID(); ?>">
                <h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="oven-prose text-muted small mb-2"><?php echo esc_html(get_the_date()); ?></div>
                <div class="oven-prose entry-summary">
                    <?php the_excerpt(); ?>
                </div>
                <a class="oven-btn-order mt-3 d-inline-flex" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'the-black-door-oven'); ?></a>
            </article>
            <?php
        endwhile;
        the_posts_navigation();
    else :
        ?>
        <p class="oven-prose"><?php esc_html_e('No posts yet.', 'the-black-door-oven'); ?></p>
    <?php endif; ?>

<?php
get_footer();
