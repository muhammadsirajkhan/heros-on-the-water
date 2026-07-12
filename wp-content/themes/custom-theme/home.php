<?php
/**
 * Home landing template — navy/yellow design.
 *
 * Template Name: Home Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main hotw-main">

    <?php get_template_part('template-parts/home/section', 'home-hero'); ?>
    <?php get_template_part('template-parts/home/section', 'mission'); ?>
    <?php get_template_part('template-parts/home/section', 'video'); ?>
    <?php get_template_part('template-parts/home/section', 'visitors'); ?>
    <?php get_template_part('template-parts/home/section', 'yellow-cta'); ?>
    <?php get_template_part('template-parts/home/section', 'hours'); ?>
    <?php get_template_part('template-parts/home/section', 'impact'); ?>

</main>

<?php
get_footer();
