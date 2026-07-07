<?php
/**
 * WordPress theme setup and asset loading.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

define('OVEN_THEME_VER', '1.0.0');

require_once get_template_directory() . '/inc/post-type-event.php';
require_once get_template_directory() . '/inc/whats-on-events.php';

/**
 * Enqueue styles and scripts (local Bootstrap, Swiper, theme assets).
 */
function oven_enqueue_assets() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();

    $common_css   = $dir . '/assets/css/common.css';
    $fonts_css    = $dir . '/assets/fonts/stylesheet.css';
    $main_js      = $dir . '/assets/js/main.js';
    $css_ver      = is_readable($common_css) ? (string) filemtime($common_css) : OVEN_THEME_VER;
    $fonts_ver    = is_readable($fonts_css) ? (string) filemtime($fonts_css) : OVEN_THEME_VER;
    $js_ver       = is_readable($main_js) ? (string) filemtime($main_js) : OVEN_THEME_VER;

    wp_enqueue_style(
        'oven-fonts-local',
        $uri . '/assets/fonts/stylesheet.css',
        array(),
        $fonts_ver
    );

    wp_enqueue_style(
        'oven-fonts-sen',
        'https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'bootstrap',
        $uri . '/assets/css/bootstrap.min.css',
        array(),
        OVEN_THEME_VER
    );

    wp_enqueue_style(
        'swiper',
        $uri . '/assets/css/swiper-bundle.min.css',
        array(),
        OVEN_THEME_VER
    );

    wp_enqueue_style(
        'oven-variables',
        $uri . '/assets/css/variables.css',
        array('bootstrap', 'swiper', 'oven-fonts-local', 'oven-fonts-sen'),
        $css_ver
    );

    wp_enqueue_style(
        'oven-common',
        $uri . '/assets/css/common.css',
        array('oven-variables'),
        $css_ver
    );
    wp_enqueue_style(
        'oven-style',
        $uri . '/assets/css/style.css',
        array('oven-common'),
        $css_ver
    );

    wp_enqueue_style(
        'oven-responsive',
        $uri . '/assets/css/responsive.css',
        array('oven-common'),
        $css_ver
    );

    wp_enqueue_script(
        'bootstrap-bundle',
        $uri . '/assets/js/bootstrap.bundle.min.js',
        array(),
        OVEN_THEME_VER,
        true
    );

    wp_enqueue_script(
        'swiper',
        $uri . '/assets/js/swiper-bundle.min.js',
        array(),
        OVEN_THEME_VER,
        true
    );

    wp_enqueue_script(
        'oven-main',
        $uri . '/assets/js/main.js',
        array('bootstrap-bundle', 'swiper'),
        $js_ver,
        true
    );
}
add_action('wp_enqueue_scripts', 'oven_enqueue_assets');

/**
 * Theme supports and menus.
 */
function oven_theme_setup() {
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
            'primary' => __('Primary navigation', 'the-black-door-oven'),
            'utility' => __('Utility navigation', 'the-black-door-oven'),
            'footer'  => __('Footer navigation', 'the-black-door-oven'),
        )
    );
}
add_action('after_setup_theme', 'oven_theme_setup');

/**
 * Widget areas (footer).
 */
function oven_widgets_init() {
    register_sidebar(
        array(
            'name'          => __('Footer main', 'the-black-door-oven'),
            'id'            => 'footer-main',
            'description'   => __('Optional widgets above the footer mission text.', 'the-black-door-oven'),
            'before_widget' => '<div id="%1$s" class="oven-footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="oven-footer-widget-title widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer bottom', 'the-black-door-oven'),
            'id'            => 'footer-bottom',
            'description'   => __('Optional narrow strip (e.g. extra links).', 'the-black-door-oven'),
            'before_widget' => '<div id="%1$s" class="oven-footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="oven-footer-widget-title widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'oven_widgets_init');

/**
 * Dummy image URL (picsum with stable seed). Replace with attachments when assets are final.
 *
 * @param int    $width  Pixel width.
 * @param int    $height Pixel height.
 * @param string $seed   Seed string (alphanumeric).
 */
function oven_placeholder_image($width, $height, $seed) {
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
function oven_gallery_image_url($index) {
    $index = (int) $index;
    if ($index < 1 || $index > 13) {
        return oven_placeholder_image(800, 600, 'oven-gallery');
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
    return oven_placeholder_image(800, 600, 'oven-g' . $index);
}

/**
 * Append body class on front / home layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function oven_body_class_home($classes) {
    if (is_front_page()) {
        $classes[] = 'oven-home';
    }
    return $classes;
}
add_filter('body_class', 'oven_body_class_home');

/**
 * Body class when using the What's On page template.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function oven_body_class_whats_on($classes) {
    if (is_page_template('page-whats-on.php')) {
        $classes[] = 'oven-whats-on';
    }
    return $classes;
}
add_filter('body_class', 'oven_body_class_whats_on');

/**
 * Fallback menu markup when no menu is assigned.
 *
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function oven_fallback_nav_primary($args) {
    $items = array(
        array(__('Home', 'the-black-door-oven'), home_url('/')),
        array(__('Our Story', 'the-black-door-oven'), home_url('/#about')),
        array(__('Menu', 'the-black-door-oven'), home_url('/#menu')),
    );
    oven_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function oven_fallback_nav_utility($args) {
    $items = array(
        array(__('Gallery', 'the-black-door-oven'), home_url('/#gallery')),
        array(__('Contact', 'the-black-door-oven'), home_url('/#contact')),
        array(__('Book a Table', 'the-black-door-oven'), home_url('/#order')),
    );
    oven_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * Footer menu fallback.
 *
 * @param array<string, mixed> $args wp_nav_menu args.
 */
function oven_fallback_nav_footer($args) {
    $items = array(
        array(__('Home', 'the-black-door-oven'), home_url('/')),
        array(__('Our Story', 'the-black-door-oven'), home_url('/#about')),
        array(__('Menu', 'the-black-door-oven'), home_url('/#menu')),
        array(__('Gallery', 'the-black-door-oven'), home_url('/#gallery')),
        array(__('Contact', 'the-black-door-oven'), home_url('/#contact')),
    );
    oven_fallback_nav_list($items, isset($args['menu_class']) ? (string) $args['menu_class'] : '');
}

/**
 * @param array<int, array{0: string, 1: string}> $items
 */
function oven_fallback_nav_list(array $items, $menu_class) {
    $class = trim('oven-fallback-menu ' . $menu_class);
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