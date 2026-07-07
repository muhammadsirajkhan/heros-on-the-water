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
