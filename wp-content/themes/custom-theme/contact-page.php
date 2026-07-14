<?php
/**
 * Contact Us page — redesigned to match mockup.
 *
 * Template Name: Contact Page
 *
 * ACF: contact_hero, contact_info, contact_group_photo (see acf-json/group_hotw_contact.json).
 * Contact Form 7 shortcode remains here (form is managed in CF7).
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$hero = function_exists('get_field') ? get_field('contact_hero') : null;
if (!is_array($hero)) {
    $hero = array();
}

$group_photo = function_exists('get_field') ? get_field('contact_group_photo') : null;
if (!is_array($group_photo)) {
    $group_photo = array();
}

$hero_image = (isset($hero['image']) && is_array($hero['image'])) ? $hero['image'] : null;
$photo      = (isset($group_photo['image']) && is_array($group_photo['image'])) ? $group_photo['image'] : null;
$uri        = get_template_directory_uri();

/*
 * Contact Form 7 shortcode — replace ID in WP Admin as needed.
 * Keep html_class on the form in CF7 if required by theme styles.
 */
$contact_args = array(
    'cf7_shortcode' => '[contact-form-7 id="caf845a" title="Contact form"]',
);
?>

<main id="primary" class="site-main hotw-main hotw-contact-page">

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
        get_template_part('template-parts/contact/section', 'contact-v2', $contact_args);
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
