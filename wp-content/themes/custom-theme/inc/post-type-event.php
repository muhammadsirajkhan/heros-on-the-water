<?php
/**
 * Events custom post type (admin list + front-end URLs for What's On).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the event post type (slug `event` — matches hotw_whats_on_post_type() default).
 */
function hotw_register_event_post_type() {
    $labels = array(
        'name'               => __('Events', 'heros-on-the-water'),
        'singular_name'      => __('Event', 'heros-on-the-water'),
        'add_new'            => __('Add New', 'heros-on-the-water'),
        'add_new_item'       => __('Add New Event', 'heros-on-the-water'),
        'edit_item'          => __('Edit Event', 'heros-on-the-water'),
        'new_item'           => __('New Event', 'heros-on-the-water'),
        'view_item'          => __('View Event', 'heros-on-the-water'),
        'search_items'       => __('Search Events', 'heros-on-the-water'),
        'not_found'          => __('No events found.', 'heros-on-the-water'),
        'not_found_in_trash' => __('No events found in Trash.', 'heros-on-the-water'),
        'menu_name'          => __('Events', 'heros-on-the-water'),
    );

    register_post_type(
        'event',
        array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-calendar-alt',
            'menu_position'      => 21,
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
            'has_archive'        => true,
            'rewrite'            => array('slug' => 'events'),
        )
    );
}
add_action('init', 'hotw_register_event_post_type');

/**
 * Flush permalinks when this theme is activated so /events/ URLs work.
 */
function hotw_event_post_type_flush_rewrites() {
    hotw_register_event_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'hotw_event_post_type_flush_rewrites');

/**
 * Register Location + Time text meta for events.
 */
function hotw_register_event_meta() {
    $args = array(
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true,
        'auth_callback'     => function () {
            return current_user_can('edit_posts');
        },
        'sanitize_callback' => 'sanitize_text_field',
    );

    register_post_meta('event', 'event_location', $args);
    register_post_meta('event', 'event_time', $args);
}
add_action('init', 'hotw_register_event_meta');

/**
 * Event details meta box (Location + Time text fields).
 */
function hotw_add_event_details_meta_box() {
    add_meta_box(
        'hotw_event_details',
        __('Event Details', 'heros-on-the-water'),
        'hotw_render_event_details_meta_box',
        'event',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'hotw_add_event_details_meta_box');

/**
 * @param WP_Post $post Post.
 */
function hotw_render_event_details_meta_box($post) {
    wp_nonce_field('hotw_save_event_details', 'hotw_event_details_nonce');

    $location = (string) get_post_meta($post->ID, 'event_location', true);
    $time     = (string) get_post_meta($post->ID, 'event_time', true);
    ?>
    <p>
        <label for="hotw_event_location"><strong><?php esc_html_e('Location', 'heros-on-the-water'); ?></strong></label><br>
        <input type="text" class="widefat" id="hotw_event_location" name="hotw_event_location" value="<?php echo esc_attr($location); ?>" placeholder="<?php esc_attr_e('e.g. Port Soderick', 'heros-on-the-water'); ?>">
    </p>
    <p>
        <label for="hotw_event_time"><strong><?php esc_html_e('Time', 'heros-on-the-water'); ?></strong></label><br>
        <input type="text" class="widefat" id="hotw_event_time" name="hotw_event_time" value="<?php echo esc_attr($time); ?>" placeholder="<?php esc_attr_e('e.g. 14:00 until 18:00', 'heros-on-the-water'); ?>">
    </p>
    <?php
}

/**
 * Save Location + Time meta.
 *
 * @param int $post_id Post ID.
 */
function hotw_save_event_details_meta_box($post_id) {
    if (!isset($_POST['hotw_event_details_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hotw_event_details_nonce'])), 'hotw_save_event_details')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) !== 'event') {
        return;
    }

    if (isset($_POST['hotw_event_location'])) {
        update_post_meta($post_id, 'event_location', sanitize_text_field(wp_unslash($_POST['hotw_event_location'])));
    }
    if (isset($_POST['hotw_event_time'])) {
        update_post_meta($post_id, 'event_time', sanitize_text_field(wp_unslash($_POST['hotw_event_time'])));
    }
}
add_action('save_post_event', 'hotw_save_event_details_meta_box');

/**
 * Event location text (ACF or post meta).
 *
 * @param int $post_id Post ID.
 * @return string
 */
function hotw_get_event_location($post_id) {
    $post_id = (int) $post_id;
    if (function_exists('get_field')) {
        $acf = trim((string) get_field('event_location', $post_id));
        if ($acf !== '') {
            return $acf;
        }
    }
    return trim((string) get_post_meta($post_id, 'event_location', true));
}

/**
 * Event time display text (custom text field, then ACF time pickers).
 *
 * @param int $post_id Post ID.
 * @return string
 */
function hotw_get_event_time_display($post_id) {
    $post_id = (int) $post_id;
    $meta = trim((string) get_post_meta($post_id, 'event_time', true));
    if ($meta !== '') {
        return $meta;
    }
    if (function_exists('hotw_whats_on_get_event_time_label')) {
        return hotw_whats_on_get_event_time_label($post_id);
    }
    return '';
}
