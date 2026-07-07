<?php
/**
 * What's On page — CPT slug and ACF/meta key (change here to match your ACF/CPT UI).
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Events custom post type slug.
 *
 * @return string
 */
function oven_whats_on_post_type() {
    return apply_filters('oven_whats_on_post_type', 'event');
}

/**
 * Post meta key for the event date (ACF field name when saved to post_meta).
 *
 * @return string
 */
function oven_whats_on_event_date_meta_key() {
    return apply_filters('oven_whats_on_event_date_meta_key', 'event_date');
}
