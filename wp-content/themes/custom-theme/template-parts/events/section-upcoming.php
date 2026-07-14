<?php
/**
 * Upcoming events card grid — Event CPT + Location/Time meta.
 *
 * ACF group: events_upcoming (headings only). Cards from Event CPT.
 * See acf-json/group_hotw_events.json.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('events_upcoming') : null;
if (!is_array($section)) {
    $section = array();
}

$badge    = isset($section['badge']) ? (string) $section['badge'] : '';
$title    = isset($section['title']) ? (string) $section['title'] : '';
$subtitle = isset($section['subtitle']) ? (string) $section['subtitle'] : '';

$event_posts = array();
if (function_exists('hotw_get_events_page_posts')) {
    $event_posts = hotw_get_events_page_posts();
} elseif (function_exists('hotw_whats_on_get_upcoming_events')) {
    $event_posts = hotw_whats_on_get_upcoming_events();
}
if (empty($event_posts) && post_type_exists('event')) {
    $event_posts = get_posts(
        array(
            'post_type'      => 'event',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'orderby'        => 'date',
            'order'          => 'DESC',
        )
    );
}

$cards = array();
foreach ($event_posts as $event_post) {
    if (!$event_post instanceof WP_Post) {
        continue;
    }
    $post_id = (int) $event_post->ID;
    $ymd     = function_exists('hotw_get_event_date_ymd') ? hotw_get_event_date_ymd($post_id) : '';
    if ($ymd === '' && function_exists('hotw_whats_on_get_event_date_for_post')) {
        $ymd = hotw_whats_on_get_event_date_for_post($post_id);
    }
    $day   = '';
    $month = '';
    if ($ymd !== '' && preg_match('/^(\d{4})(\d{2})(\d{2})$/', $ymd, $m)) {
        $ts = strtotime($m[1] . '-' . $m[2] . '-' . $m[3] . ' 12:00:00');
        if ($ts !== false) {
            $day   = wp_date('j', $ts);
            $month = wp_date('M', $ts);
        }
    }
    if ($day === '') {
        continue;
    }
    $thumb = get_the_post_thumbnail_url($post_id, 'large');
    $cards[] = array(
        'title'    => get_the_title($post_id),
        'day'      => $day,
        'month'    => $month,
        'location' => function_exists('hotw_get_event_location') ? hotw_get_event_location($post_id) : '',
        'time'     => function_exists('hotw_get_event_time_display') ? hotw_get_event_time_display($post_id) : '',
        'image'    => $thumb ? $thumb : '',
        'url'      => get_permalink($post_id),
    );
}

$icon_pin = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$icon_clock = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
?>
<section class="hotw-block hotw-events" id="content-start" aria-labelledby="hotw-events-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title hotw-events__title" id="hotw-events-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($subtitle !== '') : ?>
                <p class="hotw-section-subtitle hotw-events__subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($cards) : ?>
            <div class="hotw-events-grid">
                <?php foreach ($cards as $card) : ?>
                    <article class="hotw-event-card">
                        <div class="hotw-event-card__media-wrap">
                            <a class="hotw-event-card__media" href="<?php echo esc_url($card['url']); ?>">
                                <?php if ($card['image'] !== '') : ?>
                                    <img
                                        class="hotw-event-card__img"
                                        src="<?php echo esc_url($card['image']); ?>"
                                        alt=""
                                        width="400"
                                        height="275"
                                        loading="lazy"
                                    >
                                <?php endif; ?>
                                <?php if ($card['day'] !== '' || $card['month'] !== '') : ?>
                                    <span class="hotw-event-card__date" aria-hidden="true">
                                        <span class="hotw-event-card__day"><?php echo esc_html($card['day']); ?></span>
                                        <span class="hotw-event-card__month"><?php echo esc_html($card['month']); ?></span>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="hotw-event-card__body">
                            <h3 class="hotw-event-card__title">
                                <a href="<?php echo esc_url($card['url']); ?>"><?php echo esc_html($card['title']); ?></a>
                            </h3>
                            <?php if ($card['location'] !== '' || $card['time'] !== '') : ?>
                                <div class="hotw-event-card__meta">
                                    <?php if ($card['location'] !== '') : ?>
                                        <p class="hotw-event-card__meta-row">
                                            <span class="hotw-event-card__meta-icon"><?php echo $icon_pin; ?></span>
                                            <span><?php echo esc_html($card['location']); ?></span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if ($card['time'] !== '') : ?>
                                        <p class="hotw-event-card__meta-row">
                                            <span class="hotw-event-card__meta-icon"><?php echo $icon_clock; ?></span>
                                            <span><?php echo esc_html($card['time']); ?></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
