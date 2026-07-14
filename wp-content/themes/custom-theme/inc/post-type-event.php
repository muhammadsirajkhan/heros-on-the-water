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
 * Register Location, Time, and Date meta for events.
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
    register_post_meta('event', 'event_date', $args);
}
add_action('init', 'hotw_register_event_meta');

/**
 * Event details meta box (Date + Location + Time).
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
 * Format stored event_date (Ymd or Y-m-d) for an HTML date input.
 *
 * @param string $raw Meta value.
 * @return string Y-m-d or empty.
 */
function hotw_event_date_for_input($raw) {
    $raw = trim((string) $raw);
    if ($raw === '') {
        return '';
    }
    if (preg_match('/^\d{8}$/', $raw)) {
        return substr($raw, 0, 4) . '-' . substr($raw, 4, 2) . '-' . substr($raw, 6, 2);
    }
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $raw)) {
        return $raw;
    }
    if (function_exists('hotw_whats_on_normalize_event_date')) {
        $ymd = hotw_whats_on_normalize_event_date($raw);
        if ($ymd !== '' && preg_match('/^\d{8}$/', $ymd)) {
            return substr($ymd, 0, 4) . '-' . substr($ymd, 4, 2) . '-' . substr($ymd, 6, 2);
        }
    }
    return '';
}

/**
 * @param WP_Post $post Post.
 */
function hotw_render_event_details_meta_box($post) {
    wp_nonce_field('hotw_save_event_details', 'hotw_event_details_nonce');

    $date_raw = (string) get_post_meta($post->ID, 'event_date', true);
    $date     = hotw_event_date_for_input($date_raw);
    $location = (string) get_post_meta($post->ID, 'event_location', true);
    $time     = (string) get_post_meta($post->ID, 'event_time', true);
    ?>
    <p>
        <label for="hotw_event_date"><strong><?php esc_html_e('Event Date', 'heros-on-the-water'); ?></strong></label><br>
        <input type="date" class="widefat" id="hotw_event_date" name="hotw_event_date" value="<?php echo esc_attr($date); ?>">
        <span class="description"><?php esc_html_e('Used on event cards, the single page, and listing order.', 'heros-on-the-water'); ?></span>
    </p>
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
 * Save Date + Location + Time meta.
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

    if (isset($_POST['hotw_event_date'])) {
        $raw = sanitize_text_field(wp_unslash($_POST['hotw_event_date']));
        $ymd = '';
        if ($raw !== '') {
            if (function_exists('hotw_whats_on_normalize_event_date')) {
                $ymd = hotw_whats_on_normalize_event_date($raw);
            } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $raw)) {
                $ymd = str_replace('-', '', $raw);
            }
        }
        if ($ymd !== '') {
            update_post_meta($post_id, 'event_date', $ymd);
        } else {
            delete_post_meta($post_id, 'event_date');
        }
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

/**
 * Event date as Ymd (Event Date field / ACF / helpers).
 *
 * @param int $post_id Post ID.
 * @return string
 */
function hotw_get_event_date_ymd($post_id) {
    $post_id = (int) $post_id;
    if (function_exists('hotw_whats_on_get_event_date_for_post')) {
        return hotw_whats_on_get_event_date_for_post($post_id);
    }
    $raw = (string) get_post_meta($post_id, 'event_date', true);
    if (function_exists('hotw_whats_on_normalize_event_date')) {
        return hotw_whats_on_normalize_event_date($raw);
    }
    if (preg_match('/^\d{8}$/', $raw)) {
        return $raw;
    }
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $raw, $m)) {
        return $m[1] . $m[2] . $m[3];
    }
    return '';
}

/**
 * Events page listing: all published events with an Event Date, newest date first.
 *
 * @return WP_Post[]
 */
function hotw_get_events_page_posts() {
    if (!post_type_exists('event')) {
        return array();
    }

    $posts = get_posts(
        array(
            'post_type'              => 'event',
            'post_status'            => 'publish',
            'posts_per_page'         => -1,
            'orderby'                => 'date',
            'order'                  => 'DESC',
            'no_found_rows'          => true,
            'update_post_meta_cache' => true,
        )
    );
    if (!is_array($posts) || $posts === array()) {
        return array();
    }

    $out = array();
    foreach ($posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }
        if (hotw_get_event_date_ymd($post->ID) === '') {
            continue;
        }
        $out[] = $post;
    }

    usort(
        $out,
        static function ($a, $b) {
            $da = hotw_get_event_date_ymd($a->ID);
            $db = hotw_get_event_date_ymd($b->ID);
            $cmp = strcmp($db, $da);
            if ($cmp !== 0) {
                return $cmp;
            }
            return $b->ID <=> $a->ID;
        }
    );

    return $out;
}
