<?php
/**
 * Upcoming events card grid — Event CPT + Location/Time meta.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();

$defaults = array(
    'badge'    => __('WHAT\'S ON', 'heros-on-the-water'),
    'title'    => __('UPCOMING EVENTS', 'heros-on-the-water'),
    'subtitle' => __('BROWSE OUR UPCOMING ACTIVITIES BELOW', 'heros-on-the-water'),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;

$fallback_images = array();
for ($n = 1; $n <= 8; $n++) {
    $rel = '/assets/images/events/' . $n . '.webp';
    if (is_readable(get_template_directory() . $rel)) {
        $fallback_images[] = $uri . $rel;
    }
}
if ($fallback_images === array()) {
    $fallback_images = array(
        $uri . '/assets/images/home/visitor-1.webp',
        $uri . '/assets/images/home/visitor-2.webp',
        $uri . '/assets/images/home/mission.webp',
        $uri . '/assets/images/home/port.webp',
        $uri . '/assets/images/home/difference.webp',
        $uri . '/assets/images/home/help-more.webp',
        $uri . '/assets/images/meet-the-team/v1.webp',
        $uri . '/assets/images/meet-the-team/v2.webp',
    );
}

$event_posts = array();
if (function_exists('hotw_whats_on_get_upcoming_events')) {
    $event_posts = hotw_whats_on_get_upcoming_events();
}
if (empty($event_posts) && post_type_exists('event')) {
    $event_posts = get_posts(
        array(
            'post_type'      => 'event',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'orderby'        => 'date',
            'order'          => 'ASC',
        )
    );
}

$static_events = array(
    array(
        'title'    => __('Carriage Driving For Veterans', 'heros-on-the-water'),
        'day'      => '18',
        'month'    => 'Feb',
        'location' => __('Cringle area', 'heros-on-the-water'),
        'time'     => __('14:00 until 18:00', 'heros-on-the-water'),
        'image'    => $fallback_images[0],
        'url'      => '#',
    ),
    array(
        'title'    => __('Boat Wildlife Trip', 'heros-on-the-water'),
        'day'      => '18',
        'month'    => 'Feb',
        'location' => __('Cringle area', 'heros-on-the-water'),
        'time'     => __('14:00 until 18:00', 'heros-on-the-water'),
        'image'    => $fallback_images[1 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Sea Dips', 'heros-on-the-water'),
        'day'      => '18',
        'month'    => 'Feb',
        'location' => __('Cringle area', 'heros-on-the-water'),
        'time'     => __('14:00 until 18:00', 'heros-on-the-water'),
        'image'    => $fallback_images[2 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Walking For Wellness', 'heros-on-the-water'),
        'day'      => '18',
        'month'    => 'Feb',
        'location' => __('Cringle area', 'heros-on-the-water'),
        'time'     => __('14:00 until 18:00', 'heros-on-the-water'),
        'image'    => $fallback_images[3 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Kayak Angling Session', 'heros-on-the-water'),
        'day'      => '22',
        'month'    => 'Feb',
        'location' => __('Port Soderick', 'heros-on-the-water'),
        'time'     => __('10:00 until 14:00', 'heros-on-the-water'),
        'image'    => $fallback_images[4 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Family Fishing Day', 'heros-on-the-water'),
        'day'      => '01',
        'month'    => 'Mar',
        'location' => __('Douglas Bay', 'heros-on-the-water'),
        'time'     => __('09:30 until 13:00', 'heros-on-the-water'),
        'image'    => $fallback_images[5 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Volunteer Training Day', 'heros-on-the-water'),
        'day'      => '08',
        'month'    => 'Mar',
        'location' => __('Port Soderick', 'heros-on-the-water'),
        'time'     => __('11:00 until 15:00', 'heros-on-the-water'),
        'image'    => $fallback_images[6 % count($fallback_images)],
        'url'      => '#',
    ),
    array(
        'title'    => __('Community Paddle Meetup', 'heros-on-the-water'),
        'day'      => '15',
        'month'    => 'Mar',
        'location' => __('Peel Harbour', 'heros-on-the-water'),
        'time'     => __('13:00 until 17:00', 'heros-on-the-water'),
        'image'    => $fallback_images[7 % count($fallback_images)],
        'url'      => '#',
    ),
);

$cards = array();
if (!empty($event_posts)) {
    $i = 0;
    foreach ($event_posts as $event_post) {
        if (!$event_post instanceof WP_Post) {
            continue;
        }
        $post_id = (int) $event_post->ID;
        $ymd     = function_exists('hotw_whats_on_get_event_date_for_post') ? hotw_whats_on_get_event_date_for_post($post_id) : '';
        $day     = '';
        $month   = '';
        if ($ymd !== '') {
            $dt = DateTimeImmutable::createFromFormat('Ymd', $ymd, wp_timezone());
            if ($dt instanceof DateTimeImmutable) {
                $day   = wp_date('j', $dt->getTimestamp());
                $month = wp_date('M', $dt->getTimestamp());
            }
        }
        if ($day === '') {
            $day   = get_the_date('j', $post_id);
            $month = get_the_date('M', $post_id);
        }
        $thumb = get_the_post_thumbnail_url($post_id, 'large');
        if (!$thumb) {
            $thumb = $fallback_images[$i % count($fallback_images)];
        }
        $cards[] = array(
            'title'    => get_the_title($post_id),
            'day'      => $day,
            'month'    => $month,
            'location' => function_exists('hotw_get_event_location') ? hotw_get_event_location($post_id) : '',
            'time'     => function_exists('hotw_get_event_time_display') ? hotw_get_event_time_display($post_id) : '',
            'image'    => $thumb,
            'url'      => get_permalink($post_id),
        );
        $i++;
    }
} else {
    $cards = $static_events;
}

$icon_pin = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$icon_clock = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
?>
<section class="hotw-block hotw-events" id="content-start" aria-labelledby="hotw-events-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title hotw-events__title" id="hotw-events-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle hotw-events__subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>

        <div class="hotw-events-grid">
            <?php foreach ($cards as $card) : ?>
                <article class="hotw-event-card">
                    <div class="hotw-event-card__media-wrap">
                        <a class="hotw-event-card__media" href="<?php echo esc_url($card['url']); ?>">
                            <img
                                class="hotw-event-card__img"
                                src="<?php echo esc_url($card['image']); ?>"
                                alt=""
                                width="400"
                                height="275"
                                loading="lazy"
                            >
                            <span class="hotw-event-card__date" aria-hidden="true">
                                <span class="hotw-event-card__day"><?php echo esc_html($card['day']); ?></span>
                                <span class="hotw-event-card__month"><?php echo esc_html($card['month']); ?></span>
                            </span>
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
    </div>
</section>
