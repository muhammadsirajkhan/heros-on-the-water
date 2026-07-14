<?php
/**
 * Policy page — simple content layout for Privacy, Terms, etc.
 *
 * Template Name: Policy Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main hotw-main hotw-policy">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <div class="container hotw-policy__inner">
            <article <?php post_class('hotw-policy__article'); ?> id="page-<?php the_ID(); ?>">
                <header class="hotw-policy__header">
                    <span class="hotw-badge hotw-badge--blue"><?php esc_html_e('POLICY', 'heros-on-the-water'); ?></span>
                    <h1 class="hotw-policy__title"><?php the_title(); ?></h1>
                    <p class="hotw-policy__updated">
                        <?php
                        printf(
                            /* translators: %s: last updated date */
                            esc_html__('Last updated: %s', 'heros-on-the-water'),
                            esc_html(get_the_modified_date())
                        );
                        ?>
                    </p>
                </header>

                <div class="hotw-policy__content hotw-prose">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
