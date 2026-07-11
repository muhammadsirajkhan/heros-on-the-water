<?php
/**
 * Shared HTML header and site masthead (navy/yellow design).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$hotw_uri   = get_template_directory_uri();
$donate_url = home_url('/donate/');
$logo_src   = $hotw_uri . '/assets/images/home/header-logo.webp';
?>
<!DOCTYPE html>
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
    <a class="screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'heros-on-the-water'); ?></a>

    <header class="hotw-site-header" role="banner">
        <div class="hotw-topbar">
            <div class="hotw-topbar__inner">
                <div class="hotw-topbar__left">
                    <div class="hotw-topbar__social">
                        <a href="#" aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>" class="hotw-topbar__social-link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="#" aria-label="<?php esc_attr_e('Instagram', 'heros-on-the-water'); ?>" class="hotw-topbar__social-link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                        <a href="#" aria-label="<?php esc_attr_e('YouTube', 'heros-on-the-water'); ?>" class="hotw-topbar__social-link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon fill="#000b26" points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                        </a>
                        <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'heros-on-the-water'); ?>" class="hotw-topbar__social-link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                    </div>
                    <span class="hotw-topbar__divider" aria-hidden="true"></span>
                    <p class="hotw-topbar__tagline"><?php esc_html_e('EMPOWERMENT PROGRAMS', 'heros-on-the-water'); ?></p>
                </div>
                <a class="hotw-topbar__donate" href="<?php echo esc_url($donate_url); ?>">
                    <span class="hotw-topbar__donate-text"><?php esc_html_e('DONATE US NOW!!!', 'heros-on-the-water'); ?></span>
                    <span class="hotw-topbar__donate-icon" aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </span>
                </a>
            </div>
        </div>

        <div class="hotw-navbar">
            <div class="container">
                <div class="hotw-navbar__pill">
                    <nav class="hotw-navbar__nav hotw-navbar__nav--left d-none d-lg-flex" aria-label="<?php esc_attr_e('Primary left', 'heros-on-the-water'); ?>">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'menu_class'     => 'hotw-nav-list',
                                'fallback_cb'    => 'hotw_fallback_nav_primary',
                            )
                        );
                        ?>
                    </nav>

                    <a class="hotw-navbar__brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <span class="hotw-navbar__logo-plate">
                            <img
                                src="<?php echo esc_url($logo_src); ?>"
                                alt="<?php esc_attr_e('Heroes on the Water', 'heros-on-the-water'); ?>"
                                class="hotw-navbar__logo"
                                width="176"
                                height="176"
                            >
                        </span>
                    </a>

                    <nav class="hotw-navbar__nav hotw-navbar__nav--right d-none d-lg-flex" aria-label="<?php esc_attr_e('Primary right', 'heros-on-the-water'); ?>">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'utility',
                                'container'      => false,
                                'menu_class'     => 'hotw-nav-list',
                                'fallback_cb'    => 'hotw_fallback_nav_utility',
                            )
                        );
                        ?>
                    </nav>

                    <button type="button" class="hotw-burger mobile-menu-toggle d-lg-none" aria-expanded="false" aria-controls="hotw-mobile-panel" aria-label="<?php esc_attr_e('Open menu', 'heros-on-the-water'); ?>">
                        <span class="hotw-burger__line"></span>
                        <span class="hotw-burger__line"></span>
                        <span class="hotw-burger__line"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="mobile-nav-overlay" id="hotw-mobile-overlay"></div>
        <div class="mobile-nav-panel hotw-mobile-panel" id="hotw-mobile-panel">
            <div class="hotw-mobile-panel__head">
                <button type="button" class="hotw-mobile-close mobile-menu-close" aria-label="<?php esc_attr_e('Close menu', 'heros-on-the-water'); ?>">&times;</button>
            </div>
            <nav class="mobile-navigation" aria-label="<?php esc_attr_e('Mobile menu', 'heros-on-the-water'); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'hotw-mobile-menu',
                        'fallback_cb'    => 'hotw_fallback_nav_primary',
                    )
                );
                wp_nav_menu(
                    array(
                        'theme_location' => 'utility',
                        'container'      => false,
                        'menu_class'     => 'hotw-mobile-menu hotw-mobile-menu--utility mt-3',
                        'fallback_cb'    => 'hotw_fallback_nav_utility',
                    )
                );
                ?>
                <a class="hotw-btn hotw-btn--yellow mt-4" href="<?php echo esc_url($donate_url); ?>"><?php esc_html_e('Donate Now', 'heros-on-the-water'); ?></a>
            </nav>
        </div>
    </header>
