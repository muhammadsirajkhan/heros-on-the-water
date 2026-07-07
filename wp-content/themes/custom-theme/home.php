<?php
/**
 * Home landing template (static Phase 1; ACF-ready structure).
 *
 * Template Name: Home Page
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main oven-main">

    <?php get_template_part('template-parts/home/section', 'hero'); ?>
    <?php get_template_part('template-parts/home/section', 'purpose'); ?>
    <?php get_template_part('template-parts/home/section', 'wood'); ?>
    <?php get_template_part('template-parts/home/section', 'vibe'); ?>
    <?php get_template_part('template-parts/home/section', 'faq'); ?>
    <?php get_template_part('template-parts/home/section', 'cta'); ?>
    <?php get_template_part('template-parts/home/section', 'gallery'); ?>

</main>

<?php
get_footer();
