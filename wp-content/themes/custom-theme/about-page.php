<?php
/**
 * About Us page.
 *
 * Template Name: About Us Page
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
            'badge'       => __('ABOUT US', 'heros-on-the-water'),
            'title'       => __('FINDING PEACE BEYOND THE SHORE', 'heros-on-the-water'),
            'description' => __('Heroes on the Water Isle of Man supports veterans and families through free kayaking, fishing, and outdoor experiences that restore calm, confidence, and community.', 'heros-on-the-water'),
            'bg'          => array(
                'src' => $uri . '/assets/images/about/hero.webp',
                'alt' => __('Port Soderick coastal building', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker'); ?>
    <div class="wrapper" style="background-image: url('<?php echo $uri; ?>/assets/images/about/about-bg.webp');">
    <?php
    get_template_part('template-parts/about/section', 'info');
    get_template_part(
        'template-parts/shared/section',
        'group-photo',
        array(
            'src' => $uri . '/assets/images/home/help-more.webp',
            'alt' => __('Community group at Heroes on the Water', 'heros-on-the-water'),
        )
    );
    ?>
    </div>

</main>

<?php
get_footer();
