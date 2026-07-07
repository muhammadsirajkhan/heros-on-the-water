<?php
/**
 * Contact page — details, map, social, Contact Form 7.
 *
 * Template Name: Book Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

/**
 * Paste your shortcode from WP Admin → Contact → Contact Forms.
 * Include html_class="hotw-cf7" so theme styles apply.
 *
 * Example: '[contact-form-7 id="123" title="Contact" html_class="hotw-cf7"]'
 */
$contact_page_args = array(
    'cf7_shortcode' => '',
);
?>

<main id="primary" class="site-main hotw-main hotw-contact-page">
    <?php get_template_part('template-parts/book/section', 'booking', $contact_page_args); ?>
    <?php get_template_part('template-parts/home/section', 'faq'); ?>
    <style>
    .hotw-faq .accordion-item:has(.accordion-button) {
        background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/book/faq-book.png'); ?>');
        background-size: 100% 100%;
    }
</style>
</main>

<?php
get_footer();
