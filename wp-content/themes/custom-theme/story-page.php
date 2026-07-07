<?php
/**
 * Story page — wood-fired pizza slider and live events layout.
 *
 * Template Name: Story Page
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main oven-main oven-story">
    <?php

//     $story_hero = array(
//         'section_id' => 'top',
//         'section_class' => 'oven-hero oven-torn-bottom--white',
//         'aria_label' => __('Hero', 'the-black-door-oven'),
//         'eyebrow' => __('Wood-Fired Pizza. Good Music. Great Company.', 'the-black-door-oven'),
//         'title' => __('Fresh Pizza
// Friendly', 'the-black-door-oven'),
//         'title_strong' => __('Vibes.', 'the-black-door-oven'),
//         'description' => __('Welcome to Black Dog Oven  a family-run pizza venue where great food, local music, and a warm community.

//  atmosphere come together.', 'the-black-door-oven'),
//         'bg' => array(
//             'src' => get_template_directory_uri() . '/assets/images/story-banner.png',
//             'alt' => '',
//             'width' => 1920,
//             'height' => 900,
//             'loading' => 'eager',
//             'fetchpriority' => 'high',
//         ),
//     );

    get_template_part('template-parts/home/section', 'hero');




    // Story sections: omit third argument for built-in defaults, or pass an array of overrides
    // (same pattern as hero). Optional wrapper keys: pizza_slider_defaults, events_live_defaults.
    get_template_part('template-parts/story/section', 'pizza-slider');


    get_template_part('template-parts/home/section', 'wood');

    // Live events grid: omit third argument for built-in defaults, or pass overrides (flat array or events_live_defaults key) like hero/wood.
    get_template_part('template-parts/story/section', 'events-live');
    ?>

    <?php get_template_part('template-parts/home/section', 'faq'); ?>
    <?php get_template_part('template-parts/home/section', 'cta'); ?>
    <?php get_template_part('template-parts/home/section', 'gallery'); ?>
</main>

<?php
get_footer();
