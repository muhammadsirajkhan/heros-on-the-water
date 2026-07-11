<?php
/**
 * Upcoming events card grid (static Phase 1).
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
    'events'   => array(
        array('18 Feb', __('CARRIAGE DRIVING FOR VETERANS', 'heros-on-the-water'), __('Cringle area', 'heros-on-the-water'), '14:00 until 18:00', $uri . '/assets/images/event-1.png'),
        array('22 Feb', __('BOAT WILDLIFE TRIP', 'heros-on-the-water'), __('Port Soderick', 'heros-on-the-water'), '10:00 until 14:00', $uri . '/assets/images/event-2.png'),
        array('01 Mar', __('KAYAK FISHING DAY', 'heros-on-the-water'), __('Port Soderick', 'heros-on-the-water'), '09:00 until 13:00', $uri . '/assets/images/event-3.png'),
        array('08 Mar', __('FAMILY PADDLE SESSION', 'heros-on-the-water'), __('Port Soderick', 'heros-on-the-water'), '11:00 until 15:00', $uri . '/assets/images/g4.png'),
        array('15 Mar', __('COASTAL WALK & TALK', 'heros-on-the-water'), __('Douglas Bay', 'heros-on-the-water'), '10:00 until 12:00', $uri . '/assets/images/g5.png'),
        array('22 Mar', __('VOLUNTEER OPEN DAY', 'heros-on-the-water'), __('Port Soderick', 'heros-on-the-water'), '12:00 until 16:00', $uri . '/assets/images/g6.png'),
        array('29 Mar', __('SPRING FISHING MEET', 'heros-on-the-water'), __('Port St Mary', 'heros-on-the-water'), '08:00 until 12:00', $uri . '/assets/images/g7.png'),
        array('05 Apr', __('WELLNESS ON THE WATER', 'heros-on-the-water'), __('Port Soderick', 'heros-on-the-water'), '13:00 until 17:00', $uri . '/assets/images/g8.png'),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray hotw-events" id="content-start" aria-labelledby="hotw-events-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-events-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>
        <div class="hotw-events-grid">
            <?php foreach ($args['events'] as $event) : ?>
                <article class="hotw-event-card">
                    <div class="hotw-event-card__media">
                        <img class="hotw-event-card__img" src="<?php echo esc_url($event[4]); ?>" alt="" width="400" height="275" loading="lazy">
                        <span class="hotw-event-card__date"><?php echo esc_html($event[0]); ?></span>
                    </div>
                    <div class="hotw-event-card__body">
                        <h3 class="hotw-event-card__title"><?php echo esc_html($event[1]); ?></h3>
                        <p class="hotw-event-card__meta">
                            <span>📍 <?php echo esc_html($event[2]); ?></span>
                            <span>🕒 <?php echo esc_html($event[3]); ?></span>
                        </p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
