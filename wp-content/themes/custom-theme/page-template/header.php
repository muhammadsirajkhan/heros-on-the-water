<?php
/**
 * Shared HTML header and site masthead (navy/yellow design).
 *
 * ACF options: header_topbar, header_navbar (see acf-json/group_hotw_header.json).
 * Nav menus: Appearance → Menus (primary + utility).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$topbar = function_exists('get_field') ? get_field('header_topbar', 'option') : null;
if (!is_array($topbar)) {
    $topbar = array();
}

$navbar = function_exists('get_field') ? get_field('header_navbar', 'option') : null;
if (!is_array($navbar)) {
    $navbar = array();
}

$tagline      = isset($topbar['tagline']) ? (string) $topbar['tagline'] : '';
$social_links = (!empty($topbar['social_links']) && is_array($topbar['social_links'])) ? $topbar['social_links'] : array();
$donate       = (isset($topbar['donate_button']) && is_array($topbar['donate_button'])) ? $topbar['donate_button'] : null;
$logo         = (isset($navbar['logo']) && is_array($navbar['logo'])) ? $navbar['logo'] : null;

$donate_url    = (!empty($donate['url'])) ? $donate['url'] : '';
$donate_title  = (!empty($donate['title'])) ? $donate['title'] : '';
$donate_target = (!empty($donate['target'])) ? $donate['target'] : '';

$logo_url = (!empty($logo['url'])) ? $logo['url'] : '';
$logo_alt = (!empty($logo['alt'])) ? $logo['alt'] : get_bloginfo('name');
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
                    <?php if ($social_links) : ?>
                        <div class="hotw-topbar__social">
                            <?php foreach ($social_links as $item) : ?>
                                <?php
                                if (!is_array($item)) {
                                    continue;
                                }
                                $network = isset($item['network']) ? (string) $item['network'] : '';
                                $url     = isset($item['url']) ? (string) $item['url'] : '';
                                if ($url === '' || $network === '') {
                                    continue;
                                }
                                ?>
                                <a
                                    href="<?php echo esc_url($url); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="<?php echo esc_attr(hotw_social_network_label($network)); ?>"
                                    class="hotw-topbar__social-link"
                                >
                                    <?php echo hotw_social_network_icon($network); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($social_links && $tagline !== '') : ?>
                        <span class="hotw-topbar__divider" aria-hidden="true"></span>
                    <?php endif; ?>
                    <?php if ($tagline !== '') : ?>
                        <p class="hotw-topbar__tagline"><?php echo esc_html($tagline); ?></p>
                    <?php endif; ?>
                </div>
                <?php if ($donate_url !== '') : ?>
                    <a
                        class="hotw-topbar__donate"
                        href="<?php echo esc_url($donate_url); ?>"
                        <?php echo $donate_target ? 'target="' . esc_attr($donate_target) . '"' : ''; ?>
                        <?php echo $donate_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                    >
                        <span class="hotw-topbar__donate-text"><?php echo esc_html($donate_title !== '' ? $donate_title : __('Donate', 'heros-on-the-water')); ?></span>
                        <span class="hotw-topbar__donate-icon" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </span>
                    </a>
                <?php endif; ?>
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
                            <?php if ($logo_url !== '') : ?>
                                <img
                                    src="<?php echo esc_url($logo_url); ?>"
                                    alt="<?php echo esc_attr($logo_alt); ?>"
                                    class="hotw-navbar__logo"
                                    width="176"
                                    height="176"
                                >
                            <?php else : ?>
                                <span class="hotw-navbar__logo-text"><?php echo esc_html(get_bloginfo('name')); ?></span>
                            <?php endif; ?>
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
                <?php if ($donate_url !== '') : ?>
                    <a
                        class="hotw-btn hotw-btn--yellow mt-4"
                        href="<?php echo esc_url($donate_url); ?>"
                        <?php echo $donate_target ? 'target="' . esc_attr($donate_target) . '"' : ''; ?>
                        <?php echo $donate_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                    >
                        <?php echo esc_html($donate_title !== '' ? $donate_title : __('Donate', 'heros-on-the-water')); ?>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
