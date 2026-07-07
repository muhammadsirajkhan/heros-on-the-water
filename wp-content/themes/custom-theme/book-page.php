<?php
/**
 * Contact page — details, map, social, Contact Form 7.
 *
 * Template Name: Book Page
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();

/**
 * Paste your shortcode from WP Admin → Contact → Contact Forms.
 * Include html_class="oven-cf7" so theme styles apply.
 *
 * Example: '[contact-form-7 id="123" title="Contact" html_class="oven-cf7"]'
 */
$contact_page_args = array(
    'cf7_shortcode' => '',
);
?>

<main id="primary" class="site-main oven-main oven-contact-page">
    <?php get_template_part('template-parts/book/section', 'booking', $contact_page_args); ?>
    <?php get_template_part('template-parts/home/section', 'faq'); ?>
    <style>
    .oven-faq .accordion-item:has(.accordion-button) {
        background-image: url(http://localhost/attire-lili/wp-content/themes/custom-theme/assets/images/book/faq-book.png);
        background-size: 100% 100%;
    }
</style>
</main>

<?php
get_footer();
