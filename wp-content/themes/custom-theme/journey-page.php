<?php
/**
 * Our Journey page.
 *
 * Template Name: Our Journey Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$uri = get_template_directory_uri();
?>

<main id="primary" class="site-main hotw-main">

    <?php
    get_template_part(
        'template-parts/shared/section',
        'hero-interior',
        array(
            'badge'       => __('OUR JOURNEY', 'heros-on-the-water'),
            'title'       => __('OUR JOURNEY SO FAR', 'heros-on-the-water'),
            'description' => __('From the first clean-up to a thriving base at Port Soderick — follow the milestones that built Heroes on the Water Isle of Man.', 'heros-on-the-water'),
            'show_scroll' => true,
            'bg'          => array(
                'src' => $uri . '/assets/images/fifth-1.png',
                'alt' => __('Heroes on the Water journey', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    get_template_part('template-parts/journey/section', 'timeline');
    get_template_part(
        'template-parts/shared/section',
        'group-photo',
        array(
            'src' => $uri . '/assets/images/g1.png',
            'alt' => __('Community group at Heroes on the Water', 'heros-on-the-water'),
        )
    );
    ?>

</main>

<?php
get_footer();
