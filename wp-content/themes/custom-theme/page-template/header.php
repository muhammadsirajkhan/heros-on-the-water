<?php
/**
 * Shared HTML header and site masthead.
 *
 * @package The_Black_Door_Oven
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
    <!-- <a class="skip-to-main" href="#primary"><?php esc_html_e('Skip to content', 'the-black-door-oven'); ?></a> -->

    <header class="oven-header" role="banner">
        <div class="oven-header__bar">
            <div class="container-fluid oven-header__container">
                <div class="row align-content-center align-items-lg-end g-2 g-lg-3 py-2 py-lg-0">

                    <div class="col-4 col-lg-5 d-none d-lg-flex justify-content-lg-start ps-lg-5 pb-lg-4">
                        <nav class="oven-header__nav oven-header__nav--primary"
                            aria-label="<?php esc_attr_e('Primary', 'the-black-door-oven'); ?>">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'oven-nav-list oven-nav-list--caps',
                                    'fallback_cb' => 'oven_fallback_nav_primary',
                                )
                            );
                            ?>
                        </nav>
                    </div>

                    <div class="col-4 col-lg-2 text-center">
                        <a class="oven-header__brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.png"
                                alt="The Black Door Oven" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-8 col-lg-5 pb-lg-3">
                        <div class="oven-header__phone text-end">
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
                            class="oven-header__right d-none d-lg-flex align-items-center justify-content-lg-end gap-3">
                            <nav class="oven-header__nav oven-header__nav--utility"
                                aria-label="<?php esc_attr_e('Utility', 'the-black-door-oven'); ?>">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'utility',
                                        'container' => false,
                                        'menu_class' => 'oven-nav-list oven-nav-list--caps',
                                        'fallback_cb' => 'oven_fallback_nav_utility',
                                    )
                                );
                                ?>
                            </nav>

                            <a class="blob-button"
                                href="<?php echo esc_url(home_url('/contact-us')); ?>"><?php esc_html_e('Contact Us', 'the-black-door-oven'); ?></a>
                        </div>
                        <div class="d-flex d-lg-none align-items-center justify-content-end gap-2">
                            <a class="blob-button oven-btn-order oven-btn-order--sm"
                                href="<?php echo esc_url(home_url('/#order')); ?>"><?php esc_html_e('Order Now', 'the-black-door-oven'); ?></a>
                            <button type="button" class="oven-burger mobile-menu-toggle" aria-expanded="false"
                                aria-controls="oven-mobile-panel"
                                aria-label="<?php esc_attr_e('Open menu', 'the-black-door-oven'); ?>">
                                <span class="oven-burger__line"></span>
                                <span class="oven-burger__line"></span>
                                <span class="oven-burger__line"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mobile-nav-overlay" id="oven-mobile-overlay"></div>
        <div class="mobile-nav-panel oven-mobile-panel" id="oven-mobile-panel">
            <div class="oven-mobile-panel__head">
                <button type="button" class="oven-mobile-close mobile-menu-close"
                    aria-label="<?php esc_attr_e('Close menu', 'the-black-door-oven'); ?>">&times;</button>
            </div>
            <nav class="mobile-navigation" aria-label="<?php esc_attr_e('Mobile menu', 'the-black-door-oven'); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'oven-mobile-menu',
                        'fallback_cb' => 'oven_fallback_nav_primary',
                    )
                );
                wp_nav_menu(
                    array(
                        'theme_location' => 'utility',
                        'container' => false,
                        'menu_class' => 'oven-mobile-menu oven-mobile-menu--utility mt-3',
                        'fallback_cb' => 'oven_fallback_nav_utility',
                    )
                );
                ?>
            </nav>
        </div>
    </header>