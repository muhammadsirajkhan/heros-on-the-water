<?php
/**
 * Contact Us page — redesigned to match mockup.
 *
 * Template Name: Contact Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$uri = get_template_directory_uri();
/*
 * Contact Form 7 shortcode — replace CONTACT_FORM_ID with your form ID from WP Admin.
 * Paste the Form tab markup from the theme docs / chat into CF7, and keep html_class="hotw-cf7-touch".
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
            'badge'       => __('CONTACT US', 'heros-on-the-water'),
            'title'       => __('WE\'RE HERE WHEN YOU NEED US.', 'heros-on-the-water'),
            'description' => __('Whether you\'re interested in joining one of our activities, volunteering your time, supporting the charity, or simply have a question, we\'d love to hear from you.', 'heros-on-the-water'),
            'bg'          => array(
                'src' => $uri . '/assets/images/contact-us/hero.webp',
                'alt' => __('Contact Heroes on the Water', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    get_template_part('template-parts/contact/section', 'contact-v2', $contact_args);
    get_template_part(
        'template-parts/shared/section',
        'group-photo',
        array(
            'src' => $uri . '/assets/images/home/help-more.webp',
            'alt' => __('Community group at Heroes on the Water', 'heros-on-the-water'),
        )
    );
    ?>

</main>

<?php
get_footer();
