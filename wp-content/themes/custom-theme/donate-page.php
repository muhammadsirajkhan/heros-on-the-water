<?php
/**
 * Donate Us page.
 *
 * Template Name: Donate Page
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
            'badge'       => __('OUR DONATE', 'heros-on-the-water'),
            'title'       => __('EVERY JOURNEY BEGINS WITH HOPE', 'heros-on-the-water'),
            'description' => __('Your donation provides free kayaking, fishing, and outdoor experiences for veterans and their families across the Isle of Man.', 'heros-on-the-water'),
            'bg'          => array(
                'src' => $uri . '/assets/images/event-bg.png',
                'alt' => __('Donation presentation', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    get_template_part('template-parts/donate/section', 'impact');
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
