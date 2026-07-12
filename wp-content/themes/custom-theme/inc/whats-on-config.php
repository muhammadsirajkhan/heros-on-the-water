<?php
/**
 * What's On page — CPT slug and ACF/meta key (change here to match your ACF/CPT UI).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Events custom post type slug.
 *
 * @return string
 */
function hotw_whats_on_post_type() {
    return apply_filters('hotw_whats_on_post_type', 'event');
}

/**
 * Post meta key for the event date (ACF field name when saved to post_meta).
 *
 * @return string
 */
function hotw_whats_on_event_date_meta_key() {
    return apply_filters('hotw_whats_on_event_date_meta_key', 'event_date');
}
