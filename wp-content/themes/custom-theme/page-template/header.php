<?php
/**
 * Shared HTML header and site masthead.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
    <!-- <a class="skip-to-main" href="#primary"><?php esc_html_e('Skip to content', 'heros-on-the-water'); ?></a> -->

    <header class="hotw-header" role="banner">
        <div class="hotw-header__bar">
            <div class="container-fluid hotw-header__container">
                <div class="row align-content-center align-items-lg-end g-2 g-lg-3 py-2 py-lg-0">

                    <div class="col-4 col-lg-5 d-none d-lg-flex justify-content-lg-start ps-lg-5 pb-lg-4">
                        <nav class="hotw-header__nav hotw-header__nav--primary"
                            aria-label="<?php esc_attr_e('Primary', 'heros-on-the-water'); ?>">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'hotw-nav-list hotw-nav-list--caps',
                                    'fallback_cb' => 'hotw_fallback_nav_primary',
                                )
                            );
                            ?>
                        </nav>
                    </div>

                    <div class="col-4 col-lg-2 text-center">
                        <a class="hotw-header__brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.png"
                                alt="Heroes on the Water" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-8 col-lg-5 pb-lg-3">
                        <div class="hotw-header__phone text-end">
                            <a href="tel:<?php echo get_field('phone', 'option'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png"
                                    alt="Phone" class="img-fluid">
                                
                                <span>
                                    <span>Order Now</span>
                                    <span>44 7624 230209</span>
                                </span>
                            </a>
                        </div>
                        <div
                            class="hotw-header__right d-none d-lg-flex align-items-center justify-content-lg-end gap-3">
                            <nav class="hotw-header__nav hotw-header__nav--utility"
                                aria-label="<?php esc_attr_e('Utility', 'heros-on-the-water'); ?>">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'utility',
                                        'container' => false,
                                        'menu_class' => 'hotw-nav-list hotw-nav-list--caps',
                                        'fallback_cb' => 'hotw_fallback_nav_utility',
                                    )
                                );
                                ?>
                            </nav>

                            <a class="blob-button"
                                href="<?php echo esc_url(home_url('/contact-us')); ?>"><?php esc_html_e('Contact Us', 'heros-on-the-water'); ?></a>
                        </div>
                        <div class="d-flex d-lg-none align-items-center justify-content-end gap-2">
                            <a class="blob-button hotw-btn-order hotw-btn-order--sm"
                                href="<?php echo esc_url(home_url('/#order')); ?>"><?php esc_html_e('Order Now', 'heros-on-the-water'); ?></a>
                            <button type="button" class="hotw-burger mobile-menu-toggle" aria-expanded="false"
                                aria-controls="hotw-mobile-panel"
                                aria-label="<?php esc_attr_e('Open menu', 'heros-on-the-water'); ?>">
                                <span class="hotw-burger__line"></span>
                                <span class="hotw-burger__line"></span>
                                <span class="hotw-burger__line"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mobile-nav-overlay" id="hotw-mobile-overlay"></div>
        <div class="mobile-nav-panel hotw-mobile-panel" id="hotw-mobile-panel">
            <div class="hotw-mobile-panel__head">
                <button type="button" class="hotw-mobile-close mobile-menu-close"
                    aria-label="<?php esc_attr_e('Close menu', 'heros-on-the-water'); ?>">&times;</button>
            </div>
            <nav class="mobile-navigation" aria-label="<?php esc_attr_e('Mobile menu', 'heros-on-the-water'); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'hotw-mobile-menu',
                        'fallback_cb' => 'hotw_fallback_nav_primary',
                    )
                );
                wp_nav_menu(
                    array(
                        'theme_location' => 'utility',
                        'container' => false,
                        'menu_class' => 'hotw-mobile-menu hotw-mobile-menu--utility mt-3',
                        'fallback_cb' => 'hotw_fallback_nav_utility',
                    )
                );
                ?>
            </nav>
        </div>
    </header>