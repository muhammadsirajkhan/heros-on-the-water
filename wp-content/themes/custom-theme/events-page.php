<?php
/**
 * Events page — upcoming activities grid.
 *
 * Template Name: Events Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$uri = get_template_directory_uri();
$hero_src = $uri . '/assets/images/events/hero.webp';
if (!is_readable(get_template_directory() . '/assets/images/events/hero.webp')) {
    $hero_src = $uri . '/assets/images/home/difference.webp';
}
?>

<main id="primary" class="site-main hotw-main">

    <?php
    get_template_part(
        'template-parts/shared/section',
        'hero-interior',
        array(
            'badge'       => __('EVENTS', 'heros-on-the-water'),
            'title'       => __('EVENTS THAT BRING HEROES TOGETHER', 'heros-on-the-water'),
            'description' => __('From kayaking and fishing to community gatherings — our events create space for veterans and families to connect, heal, and belong.', 'heros-on-the-water'),
            'bg'          => array(
                'src' => $hero_src,
                'alt' => __('Veterans at a Heroes on the Water event', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    ?>
    <div class="wrapper" style="background-image: url('<?php echo esc_url($uri . '/assets/images/about/about-bg.webp'); ?>');">
    <?php
    get_template_part('template-parts/events/section', 'upcoming');
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
