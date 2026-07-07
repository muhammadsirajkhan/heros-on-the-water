<?php
/**
 * Shared site footer and closing HTML.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php if (is_home() || is_front_page() || is_page(30) || is_page(34)): ?>

<?php else: ?>
    <?php get_template_part('template-parts/home/section', 'cta'); ?>
<?php endif; ?>

</main>

<footer class="oven-footer" id="contact" role="contentinfo"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/footer-bg.png');">
    <div class="oven-footer__inner">
        <div class="container">
            <?php if (is_active_sidebar('footer-main')): ?>
                <div class="oven-footer__widgets row justify-content-center mb-4">
                    <div class="col-lg-10">
                        <?php dynamic_sidebar('footer-main'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="oven-footer__logo text-center mb-4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png"
                    alt="The Black Door Oven" class="img-fluid">
            </div>

            <div class="oven-footer__mission text-center oven-prose oven-prose--on-dark mx-auto mb-lg-5 mb-4">
                <p>At Black Dog Oven, we believe that the best moments in life happen around great food. Our family-run
                    venue brings together handcrafted wood-fired pizzas, refreshing drinks, and live local music to
                    create a relaxed and welcoming place for everyone.Whether you're joining us for a casual dinner,
                    meeting friends for drinks, or enjoying an evening of live music, we aim to make every visit
                    memorable.</p>
            </div>



            <?php if (is_active_sidebar('footer-bottom')): ?>
                <div class="oven-footer__widgets-bottom text-center mb-3">
                    <?php dynamic_sidebar('footer-bottom'); ?>
                </div>
            <?php endif; ?>

            <div class="oven-footer__bottom row align-items-center mb-lg-5 mb-4">
                <div class="col-md-8 text-center text-md-start small">
                    <nav class="oven-footer__nav"
                        aria-label="<?php esc_attr_e('Footer menu', 'the-black-door-oven'); ?>">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'container' => false,
                                'menu_class' => 'oven-footer__menu',
                                'fallback_cb' => 'oven_fallback_nav_footer',
                            )
                        );
                        ?>
                    </nav>

                </div>
                <div class="col-md-4 text-center text-md-end">
                    <div
                        class="oven-footer__social-icons d-inline-flex align-items-center justify-content-center justify-content-md-end">
                        <a class="oven-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Instagram', 'the-black-door-oven'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f1.png" alt="facebook"
                                class="img-fluid">
                        </a>
                        <a class="oven-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'the-black-door-oven'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f2.png" alt="facebook"
                                class="img-fluid">

                        </a>
                        <a class="oven-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'the-black-door-oven'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f3.png" alt="facebook"
                                class="img-fluid">

                        </a>
                        <a class="oven-social-icon" href="#"
                            aria-label="<?php esc_attr_e('Facebook', 'the-black-door-oven'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/f4.png" alt="facebook"
                                class="img-fluid">

                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright">© 2026 Black Dog Oven. All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>