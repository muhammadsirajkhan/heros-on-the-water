<?php
/**
 * WordPress theme setup and asset loading.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HOTW_THEME_VER', '1.0.0');

require_once get_template_directory() . '/inc/post-type-event.php';
require_once get_template_directory() . '/inc/whats-on-events.php';

/**
 * Enqueue styles and scripts (local Bootstrap, Swiper, theme assets).
 */
function hotw_enqueue_assets() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();

    $common_css   = $dir . '/assets/css/common.css';
    $fonts_css    = $dir . '/assets/fonts/stylesheet.css';
    $main_js      = $dir . '/assets/js/main.js';
    $css_ver      = is_readable($common_css) ? (string) filemtime($common_css) : HOTW_THEME_VER;
    $fonts_ver    = is_readable($fonts_css) ? (string) filemtime($fonts_css) : HOTW_THEME_VER;
    $js_ver       = is_readable($main_js) ? (string) filemtime($main_js) : HOTW_THEME_VER;

    wp_enqueue_style(
        'hotw-fonts-local',
        $uri . '/assets/fonts/stylesheet.css',
        array(),
        $fonts_ver
    );

    wp_enqueue_style(
        'hotw-fonts-anton',
        'https://fonts.googleapis.com/css2?family=Anton&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'bootstrap',
        $uri . '/assets/css/bootstrap.min.css',
        array(),
        HOTW_THEME_VER
    );

    wp_enqueue_style(
        'swiper',
        $uri . '/assets/css/swiper-bundle.min.css',
        array(),
        HOTW_THEME_VER
    );

    wp_enqueue_style(
        'hotw-variables',
        $uri . '/assets/css/variables.css',
        array('bootstrap', 'swiper', 'hotw-fonts-local', 'hotw-fonts-anton'),
        $css_ver
    );

    wp_enqueue_style(
        'hotw-common',
        $uri . '/assets/css/common.css',
        array('hotw-variables'),
        $css_ver
    );
    wp_enqueue_style(
        'hotw-style',
        $uri . '/assets/css/style.css',
        array('hotw-common'),
        $css_ver
    );

    wp_enqueue_style(
        'hotw-responsive',
        $uri . '/assets/css/responsive.css',
        array('hotw-common'),
        $css_ver
    );

    wp_enqueue_script(
        'bootstrap-bundle',
        $uri . '/assets/js/bootstrap.bundle.min.js',
        array(),
        HOTW_THEME_VER,
        true
    );

    wp_enqueue_script(
        'swiper',
        $uri . '/assets/js/swiper-bundle.min.js',
        array(),
        HOTW_THEME_VER,
        true
    );

    wp_enqueue_script(
        'hotw-main',
        $uri . '/assets/js/main.js',
        array('bootstrap-bundle', 'swiper'),
        $js_ver,
        true
    );
}
add_action('wp_enqueue_scripts', 'hotw_enqueue_assets');

/**
 * Theme supports and menus.
 */
function hotw_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('post-thumbnails');
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 200,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    register_nav_menus(
        array(
            'primary' => __('Primary navigation', 'heros-on-the-water'),
            'utility' => __('Utility navigation', 'heros-on-the-water'),
            'footer'  => __('Footer navigation', 'heros-on-the-water'),
        )
    );
}
add_action('after_setup_theme', 'hotw_theme_setup');

/**
 * Widget areas (footer).
 */
function hotw_widgets_init() {
    register_sidebar(
        array(
            'name'          => __('Footer main', 'heros-on-the-water'),
            'id'            => 'footer-main',
            'description'   => __('Optional widgets above the footer mission text.', 'heros-on-the-water'),
            'before_widget' => '<div id="%1$s" class="hotw-footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="hotw-footer-widget-title widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer bottom', 'heros-on-the-water'),
            'id'            => 'footer-bottom',
            'description'   => __('Optional narrow strip (e.g. extra links).', 'heros-on-the-water'),
            'before_widget' => '<div id="%1$s" class="hotw-footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="hotw-footer-widget-title widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'hotw_widgets_init');

/**
 * Dummy image URL (picsum with stable seed). Replace with attachments when assets are final.
 *
 * @param int    $width  Pixel width.
 * @param int    $height Pixel height.
 * @param string $seed   Seed string (alphanumeric).
 */
function hotw_placeholder_image($width, $height, $seed) {
    $seed = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $seed);
    return sprintf('https://picsum.photos/seed/%s/%d/%d', $seed, (int) $width, (int) $height);
}

/**
 * URL for a numbered home gallery file under assets/images (g1–g13).
 *
 * Tries common extensions in order; falls back to a stable placeholder if missing.
 *
 * @param int $index Gallery index 1–13.
 * @return string Image URL.
 */
function hotw_gallery_image_url($index) {
    $index = (int) $index;
    if ($index < 1 || $index > 13) {
        return hotw_placeholder_image(800, 600, 'hotw-gallery');
    }
    $dir = get_template_directory();
    $uri = get_template_directory_uri();
    $base = '/assets/images/g' . $index;
    foreach (array('webp', 'jpg', 'jpeg', 'png') as $ext) {
        $rel = $base . '.' . $ext;
        if (is_readable($dir . $rel)) {
            return $uri . $rel;
        }
    }
    return hotw_placeholder_image(800, 600, 'hotw-g' . $index);
}

/**
 * Append body class on front / home layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function hotw_body_class_home($classes) {
    if (is_front_page()) {
        $classes[] = 'hotw-home';
    }
    return $classes;
}
add_filter('body_class', 'hotw_body_class_home');

/**
 * Body class when using the What's On page template.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function hotw_body_class_whats_on($classes) {
    if (is_page_template('page-whats-on.php')) {
        $classes[] = 'hotw-whats-on';
    }
    return $classes;
}
add_filter('body_class', 'hotw_body_class_whats_on');

/**
 * Body class on single Event posts.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function hotw_body_class_single_event($classes) {
    if (is_singular('event')) {
        $classes[] = 'hotw-single-event-page';
    }
    return $classes;
}
add_filter('body_class', 'hotw_body_class_single_event');

/**
 * Body class on Policy Page template.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function hotw_body_class_policy($classes) {
    if (is_page_template('policy-page.php')) {
        $classes[] = 'hotw-policy-page';
    }
    return $classes;
}
add_filter('body_class', 'hotw_body_class_policy');

/**
 * Fallback menu markup when no menu is assigned.
 *
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function hotw_fallback_nav_primary($args) {
    $items = array(
        array(__('About Us', 'heros-on-the-water'), home_url('/about-us/')),
        array(__('Our Journey', 'heros-on-the-water'), home_url('/our-journey/')),
        array(__('Meet Team', 'heros-on-the-water'), home_url('/meet-the-team/')),
    );
    hotw_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function hotw_fallback_nav_utility($args) {
    $items = array(
        array(__('Partners', 'heros-on-the-water'), home_url('/partners/')),
        array(__('Events', 'heros-on-the-water'), home_url('/events/')),
        array(__('Contact Us', 'heros-on-the-water'), home_url('/contact/')),
    );
    hotw_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * Footer menu fallback.
 *
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function hotw_fallback_nav_footer($args) {
    $items = array(
        array(__('Home', 'heros-on-the-water'), home_url('/')),
        array(__('About Us', 'heros-on-the-water'), home_url('/about-us/')),
        array(__('Events', 'heros-on-the-water'), home_url('/events/')),
        array(__('Donate', 'heros-on-the-water'), home_url('/donate/')),
        array(__('Partners', 'heros-on-the-water'), home_url('/partners/')),
        array(__('Contact', 'heros-on-the-water'), home_url('/contact/')),
    );
    hotw_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * @param array<int, array{0: string, 1: string}> $items
 */
function hotw_fallback_nav_list(array $items, $menu_class) {
    $class = trim('hotw-fallback-menu ' . $menu_class);
    echo '<ul class="' . esc_attr($class) . '">';
    foreach ($items as $pair) {
        echo '<li><a href="' . esc_url($pair[1]) . '">' . esc_html($pair[0]) . '</a></li>';
    }
    echo '</ul>';
}


add_action('acf/init', 'hotw_register_acf_options_page');

/**
 * Global Theme Settings options page (header / shared chrome).
 */
function hotw_register_acf_options_page() {
    if (!function_exists('acf_add_options_page')) {
        return;
    }

    acf_add_options_page(
        array(
            'page_title' => __('Theme Settings', 'heros-on-the-water'),
            'menu_title' => __('Theme Settings', 'heros-on-the-water'),
            'menu_slug'  => 'hotw-theme-settings',
            'capability' => 'edit_theme_options',
            'redirect'   => false,
            'position'   => 59,
            'icon_url'   => 'dashicons-admin-customizer',
        )
    );
}

/**
 * Store ACF field groups in the theme for version control.
 *
 * @param string $path Default ACF JSON path.
 * @return string
 */
function hotw_acf_json_save_point($path) {
    return get_template_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'hotw_acf_json_save_point');

/**
 * Load ACF field groups from the theme.
 *
 * @param array<int, string> $paths Existing JSON paths.
 * @return array<int, string>
 */
function hotw_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'hotw_acf_json_load_point');

/**
 * Label for a social network key.
 *
 * @param string $network Network slug.
 * @return string
 */
function hotw_social_network_label($network) {
    $labels = array(
        'facebook'  => __('Facebook', 'heros-on-the-water'),
        'instagram' => __('Instagram', 'heros-on-the-water'),
        'youtube'   => __('YouTube', 'heros-on-the-water'),
        'x'         => __('X', 'heros-on-the-water'),
        'tiktok'    => __('TikTok', 'heros-on-the-water'),
        'linkedin'  => __('LinkedIn', 'heros-on-the-water'),
    );
    $network = (string) $network;
    return isset($labels[$network]) ? $labels[$network] : $network;
}

/**
 * Inline SVG icon for a social network.
 *
 * @param string $network Network slug.
 * @return string HTML (safe static SVG markup).
 */
function hotw_social_network_icon($network) {
    switch ((string) $network) {
        case 'facebook':
            return '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>';
        case 'instagram':
            return '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>';
        case 'youtube':
            return '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186 31.247 31.247 0 0 0 0 12.017a31.25 31.25 0 0 0 .502 5.831 3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136A31.25 31.25 0 0 0 24 12.017a31.247 31.247 0 0 0-.502-5.831zM9.545 15.568V8.466l6.273 3.551-6.273 3.551z"/></svg>';
        case 'tiktok':
            return '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.16 15.3a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.7a8.2 8.2 0 0 0 4.76 1.52V6.8a4.85 4.85 0 0 1-1.01-.11z"/></svg>';
        case 'linkedin':
            return '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>';
        case 'x':
        default:
            return '<svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.727-8.829L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>';
    }
}

/**
 * Contact Form 7 — require truck selection for Get In Touch human check.
 *
 * @param WPCF7_Validation $result Validation result.
 * @param WPCF7_FormTag    $tag    Form tag.
 * @return WPCF7_Validation
 */
function hotw_cf7_validate_human_truck($result, $tag) {
    if (!is_object($tag) || !isset($tag->name)) {
        return $result;
    }

    // Accept either the recommended name or CF7's default radio-1.
    if (!in_array($tag->name, array('human_check', 'radio-1'), true)) {
        return $result;
    }

    $name  = $tag->name;
    $value = isset($_POST[$name]) ? sanitize_text_field(wp_unslash($_POST[$name])) : '';
    if ('truck' !== $value) {
        $result->invalidate($tag, __('Please select the truck to prove you are human.', 'heros-on-the-water'));
    }

    return $result;
}
add_filter('wpcf7_validate_radio', 'hotw_cf7_validate_human_truck', 20, 2);
add_filter('wpcf7_validate_radio*', 'hotw_cf7_validate_human_truck', 20, 2);
