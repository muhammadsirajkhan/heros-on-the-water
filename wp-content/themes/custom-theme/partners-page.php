<?php
/**
 * Our Partners page.
 *
 * Template Name: Our Partners Page
 *
 * ACF: partners_hero, partners_supporters, partners_cards, partners_group_photo
 * (see acf-json/group_hotw_partners.json).
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$uri = get_template_directory_uri();

$hero = function_exists('get_field') ? get_field('partners_hero') : null;
if (!is_array($hero)) {
    $hero = array();
}

$group_photo = function_exists('get_field') ? get_field('partners_group_photo') : null;
if (!is_array($group_photo)) {
    $group_photo = array();
}

$hero_image = (isset($hero['image']) && is_array($hero['image'])) ? $hero['image'] : null;
$photo      = (isset($group_photo['image']) && is_array($group_photo['image'])) ? $group_photo['image'] : null;
?>

<main id="primary" class="site-main hotw-main">

    <?php
    get_template_part(
        'template-parts/shared/section',
        'hero-interior',
        array(
            'badge'       => isset($hero['badge']) ? (string) $hero['badge'] : '',
            'title'       => isset($hero['title']) ? (string) $hero['title'] : '',
            'description' => isset($hero['description']) ? (string) $hero['description'] : '',
            'bg'          => array(
                'src' => (!empty($hero_image['url'])) ? $hero_image['url'] : '',
                'alt' => (!empty($hero_image['alt'])) ? $hero_image['alt'] : '',
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    ?>

    <div class="wrapper" style="background-image: url('<?php echo esc_url($uri . '/assets/images/about/about-bg.webp'); ?>');">
        <?php
        get_template_part('template-parts/partners/section', 'supporters');
        get_template_part('template-parts/partners/section', 'partners');
        get_template_part(
            'template-parts/shared/section',
            'group-photo',
            array(
                'src' => (!empty($photo['url'])) ? $photo['url'] : '',
                'alt' => (!empty($photo['alt'])) ? $photo['alt'] : '',
            )
        );
        ?>
    </div>

</main>

<?php
get_footer();
