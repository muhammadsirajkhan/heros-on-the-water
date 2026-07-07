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
        'hotw-fonts-sen',
        'https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap',
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
        array('bootstrap', 'swiper', 'hotw-fonts-local', 'hotw-fonts-sen'),
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
 * Fallback menu markup when no menu is assigned.
 *
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function hotw_fallback_nav_primary($args) {
    $items = array(
        array(__('Home', 'heros-on-the-water'), home_url('/')),
        array(__('Our Story', 'heros-on-the-water'), home_url('/our-story/')),
        array(__('Events', 'heros-on-the-water'), home_url('/whats-on/')),
    );
    hotw_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function hotw_fallback_nav_utility($args) {
    $items = array(
        array(__('Gallery', 'heros-on-the-water'), home_url('/gallery/')),
        array(__('Contact', 'heros-on-the-water'), home_url('/contact/')),
        array(__('Get Involved', 'heros-on-the-water'), home_url('/book/')),
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
        array(__('Our Story', 'heros-on-the-water'), home_url('/our-story/')),
        array(__('Events', 'heros-on-the-water'), home_url('/whats-on/')),
        array(__('Gallery', 'heros-on-the-water'), home_url('/gallery/')),
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


add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

  }
});