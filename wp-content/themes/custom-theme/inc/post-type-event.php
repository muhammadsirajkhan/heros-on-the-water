<?php
/**
 * Events custom post type (admin list + front-end URLs for What's On).
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the event post type (slug `event` — matches oven_whats_on_post_type() default).
 */
function oven_register_event_post_type() {
    $labels = array(
        'name'               => __('Events', 'the-black-door-oven'),
        'singular_name'      => __('Event', 'the-black-door-oven'),
        'add_new'            => __('Add New', 'the-black-door-oven'),
        'add_new_item'       => __('Add New Event', 'the-black-door-oven'),
        'edit_item'          => __('Edit Event', 'the-black-door-oven'),
        'new_item'           => __('New Event', 'the-black-door-oven'),
        'view_item'          => __('View Event', 'the-black-door-oven'),
        'search_items'       => __('Search Events', 'the-black-door-oven'),
        'not_found'          => __('No events found.', 'the-black-door-oven'),
        'not_found_in_trash' => __('No events found in Trash.', 'the-black-door-oven'),
        'menu_name'          => __('Events', 'the-black-door-oven'),
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
add_action('init', 'oven_register_event_post_type');

/**
 * Flush permalinks when this theme is activated so /events/ URLs work.
 */
function oven_event_post_type_flush_rewrites() {
    oven_register_event_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'oven_event_post_type_flush_rewrites');
