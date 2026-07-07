<?php
/**
 * Shared site footer and closing HTML.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php if (is_home() || is_front_page() || is_page_template('book-page.php') || is_page_template('contact-page.php')): ?>

<?php else: ?>
    <?php get_template_part('template-parts/home/section', 'cta'); ?>
<?php endif; ?>

</main>

<footer class="hotw-footer" id="contact" role="contentinfo"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/footer-bg.png');">
    <div class="hotw-footer__inner">
        <div class="container">
            <?php if (is_active_sidebar('footer-main')): ?>
                <div class="hotw-footer__widgets row justify-content-center mb-4">
                    <div class="col-lg-10">
                        <?php dynamic_sidebar('footer-main'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="hotw-footer__logo text-center mb-4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png"
                    alt="Heroes on the Water" class="img-fluid">
            </div>

            <div class="hotw-footer__mission text-center hotw-prose hotw-prose--on-dark mx-auto mb-lg-5 mb-4">
                <p><?php esc_html_e('Heroes on the Water brings veterans, service members, and their families together through kayak fishing and the healing power of nature. Every outing is a chance to connect, decompress, and build community on the water.', 'heros-on-the-water'); ?></p>
            </div>



            <?php if (is_active_sidebar('footer-bottom')): ?>
                <div class="hotw-footer__widgets-bottom text-center mb-3">
                    <?php dynamic_sidebar('footer-bottom'); ?>
                </div>
            <?php endif; ?>

            <div class="hotw-footer__bottom row align-items-center mb-lg-5 mb-4">
                <div class="col-md-8 text-center text-md-start small">
                    <nav class="hotw-footer__nav"
                        aria-label="<?php esc_attr_e('Footer menu', 'heros-on-the-water'); ?>">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'container' => false,
                                'menu_class' => 'hotw-footer__menu',
                                'fallback_cb' => 'hotw_fallback_nav_footer',
                            )
                        );
                        ?>
                    </nav>

                </div>
                <div class="col-md-4 text-center text-md-end">
                    <div
                        class="hotw-footer__social-icons d-inline-flex align-items-center justify-content-center justify-content-md-end">
                        <a class="hotw-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Instagram', 'heros-on-the-water'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f1.png" alt="facebook"
                                class="img-fluid">
                        </a>
                        <a class="hotw-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f2.png" alt="facebook"
                                class="img-fluid">

                        </a>
                        <a class="hotw-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f3.png" alt="facebook"
                                class="img-fluid">

                        </a>
                        <a class="hotw-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f4.png" alt="facebook"
                                class="img-fluid">

                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright"><?php echo esc_html(sprintf(__('© %s Heroes on the Water. All Rights Reserved.', 'heros-on-the-water'), gmdate('Y'))); ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>