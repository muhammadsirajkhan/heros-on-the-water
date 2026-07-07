<?php
/**
 * What's On — queries and date helpers for the calendar and upcoming list.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/whats-on-config.php';

/**
 * Normalize stored event date to Ymd for comparisons and map keys.
 *
 * @param mixed    $raw          Value from post meta or ACF.
 * @param int|null $prefer_year  When the string has no year (e.g. ACF "F j"), use this year first (e.g. post year).
 * @return string Eight-digit Ymd or empty string if invalid.
 */
function oven_whats_on_normalize_event_date($raw, $prefer_year = null) {
    if ($raw instanceof DateTimeInterface) {
        return $raw->format('Ymd');
    }
    $raw = trim((string) $raw);
    if ($raw === '') {
        return '';
    }
    if (preg_match('/^\d{8}$/', $raw)) {
        return $raw;
    }
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $raw, $m)) {
        return $m[1] . $m[2] . $m[3];
    }

    $tz = wp_timezone();

    $formats = array(
        'F j, Y',
        'M j, Y',
        'j F Y',
        'd/m/Y',
        'd-m-Y',
        'j-n-Y',
        'm/d/Y',
        'Y-m-d H:i:s',
        'Y-m-d',
    );
    foreach ($formats as $fmt) {
        $dt = DateTimeImmutable::createFromFormat($fmt, $raw, $tz);
        if ($dt instanceof DateTimeImmutable) {
            return $dt->format('Ymd');
        }
    }

    if (preg_match('/^[A-Za-z]+\s+\d{1,2}$/', $raw)) {
        $years = array(
            (int) wp_date('Y'),
            (int) wp_date('Y') + 1,
        );
        if ($prefer_year !== null) {
            array_unshift($years, (int) $prefer_year);
        }
        $years = array_values(array_unique(array_filter($years)));
        foreach ($years as $year) {
            $try = $raw . ' ' . (string) (int) $year;
            $dt = DateTimeImmutable::createFromFormat('F j Y', $try, $tz);
            if ($dt instanceof DateTimeImmutable) {
                return $dt->format('Ymd');
            }
        }
    }

    $ts = strtotime($raw);
    if ($ts !== false) {
        return wp_date('Ymd', $ts);
    }
    return '';
}

/**
 * Event date (Ymd) for a post from meta / ACF.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function oven_whats_on_get_event_date_for_post($post_id) {
    $post_id = (int) $post_id;
    $key = oven_whats_on_event_date_meta_key();
    $raw = get_post_meta($post_id, $key, true);
    if (($raw === '' || $raw === null || $raw === false) && function_exists('get_field')) {
        $raw = get_field($key, $post_id);
    }
    if (is_array($raw)) {
        if (isset($raw['date']) && is_string($raw['date'])) {
            $raw = $raw['date'];
        } elseif (isset($raw[0])) {
            $raw = $raw[0];
        } else {
            $raw = '';
        }
    }
    $prefer_year = null;
    $post = get_post($post_id);
    if ($post && $post->post_date) {
        $prefer_year = (int) substr($post->post_date, 0, 4);
    }
    return oven_whats_on_normalize_event_date($raw, $prefer_year);
}

/**
 * Optional time range label from ACF time pickers.
 *
 * Supports: event_start_time + event_end_time (current field names), or legacy event_time + event_end.
 *
 * @param int $post_id Post ID.
 * @return string Human-readable fragment or empty.
 */
function oven_whats_on_get_event_time_label($post_id) {
    $post_id = (int) $post_id;
    $start = '';
    $end = '';
    if (function_exists('get_field')) {
        $start = trim((string) get_field('event_start_time', $post_id));
        $end = trim((string) get_field('event_end_time', $post_id));
        if ($start === '' && $end === '') {
            $start = trim((string) get_field('event_time', $post_id));
            $end = trim((string) get_field('event_end', $post_id));
        }
    }
    if ($start === '' && $end === '') {
        $start = trim((string) get_post_meta($post_id, 'event_start_time', true));
        $end = trim((string) get_post_meta($post_id, 'event_end_time', true));
    }
    if ($start === '' && $end === '') {
        return '';
    }
    if ($start !== '' && $end !== '') {
        return $start . ' – ' . $end;
    }
    return $start !== '' ? $start : $end;
}

/**
 * All published events that have a usable event date (meta or ACF via oven_whats_on_get_event_date_for_post).
 *
 * We avoid relying on a SQL meta EXISTS clause alone: some ACF setups still resolve the date through
 * get_field() even when the initial meta_query would not match as expected.
 *
 * @return WP_Post[]
 */
function oven_whats_on_get_published_events_having_date_meta() {
    $pt = oven_whats_on_post_type();
    if (!post_type_exists($pt)) {
        return array();
    }
    $posts = get_posts(
        array(
            'post_type'      => $pt,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        )
    );
    if (!is_array($posts)) {
        return array();
    }
    $out = array();
    foreach ($posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }
        if (oven_whats_on_get_event_date_for_post($post->ID) !== '') {
            $out[] = $post;
        }
    }
    return $out;
}

/**
 * Sort posts by normalized event_date ascending.
 *
 * @param WP_Post[] $posts Posts.
 * @return void
 */
function oven_whats_on_sort_posts_by_event_date(array &$posts) {
    usort(
        $posts,
        static function ($a, $b) {
            $da = oven_whats_on_get_event_date_for_post($a->ID);
            $db = oven_whats_on_get_event_date_for_post($b->ID);
            return strcmp($da, $db);
        }
    );
}

/**
 * Fetch event posts whose event_date falls in an inclusive Ymd range (PHP-filtered for any ACF storage format).
 *
 * @param string $start_ymd Inclusive start Ymd.
 * @param string $end_ymd   Inclusive end Ymd.
 * @return WP_Post[]
 */
function oven_whats_on_get_events_for_range($start_ymd, $end_ymd) {
    $posts = oven_whats_on_get_published_events_having_date_meta();
    $out = array();
    foreach ($posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }
        $ymd = oven_whats_on_get_event_date_for_post($post->ID);
        if ($ymd === '' || $ymd < (string) $start_ymd || $ymd > (string) $end_ymd) {
            continue;
        }
        $out[] = $post;
    }
    oven_whats_on_sort_posts_by_event_date($out);
    return $out;
}

/**
 * Upcoming events from today (site timezone), ordered by event date ascending.
 *
 * @return WP_Post[]
 */
function oven_whats_on_get_upcoming_events() {
    $posts = oven_whats_on_get_published_events_having_date_meta();
    $today = wp_date('Ymd');
    $out = array();
    foreach ($posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }
        $ymd = oven_whats_on_get_event_date_for_post($post->ID);
        if ($ymd === '' || $ymd < $today) {
            continue;
        }
        $out[] = $post;
    }
    oven_whats_on_sort_posts_by_event_date($out);
    $limit = (int) apply_filters('oven_whats_on_upcoming_limit', -1);
    if ($limit > 0 && count($out) > $limit) {
        $out = array_slice($out, 0, $limit);
    }
    return $out;
}

/**
 * Map Ymd => list of posts (multiple events same day).
 *
 * @param WP_Post[] $posts Posts from range query.
 * @return array<string, WP_Post[]>
 */
function oven_whats_on_build_day_map(array $posts) {
    $map = array();
    foreach ($posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }
        $ymd = oven_whats_on_get_event_date_for_post($post->ID);
        if ($ymd === '') {
            continue;
        }
        if (!isset($map[$ymd])) {
            $map[$ymd] = array();
        }
        $map[$ymd][] = $post;
    }
    return $map;
}
