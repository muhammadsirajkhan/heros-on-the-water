<?php
/**
 * Contact page — details, map, social, Contact Form 7.
 *
 * Template Name: Contact Page
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
    <?php get_template_part('template-parts/contact/section', 'contact', $contact_page_args); ?>
     <?php get_template_part('template-parts/home/section', 'cta'); ?>
    <?php get_template_part('template-parts/home/section', 'faq'); ?>
        <style>
            .oven-faq .accordion-item:has(.accordion-button) {
                background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/book/faq-book.png);
                background-size: 100% 100%;
            }
        </style>
</main>

<?php
get_footer();
