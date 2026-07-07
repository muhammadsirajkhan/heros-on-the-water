<?php
/**
 * What's On — upcoming events card grid.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

$upcoming_posts = (isset($upcoming_posts) && is_array($upcoming_posts)) ? $upcoming_posts : array();
?>
<section class="oven-section oven-whats-on__upcoming-section" id="upcoming-events">
    <div class="container">
        <header class="oven-whats-on-upcoming__header text-center mb-4 mb-lg-5">
            <p class="oven-kicker"><?php esc_html_e('Black Dog Oven', 'the-black-door-oven'); ?></p>
            <h2 class="oven-title oven-whats-on-upcoming__title">
                <?php esc_html_e('Our upcoming', 'the-black-door-oven'); ?>
                <strong><?php esc_html_e('Events', 'the-black-door-oven'); ?></strong>
            </h2>
        </header>

        <?php if ($upcoming_posts === array()) : ?>
            <p class="oven-whats-on-upcoming__empty text-center text-muted">
                <?php esc_html_e('No upcoming events right now. Check back soon.', 'the-black-door-oven'); ?>
            </p>
        <?php else : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                <?php
                foreach ($upcoming_posts as $post) {
                    $post_id = (int) $post->ID;
                    $ymd = oven_whats_on_get_event_date_for_post($post_id);
                    $badge_day = '';
                    $badge_month = '';
                    if ($ymd !== '') {
                        $dt = DateTimeImmutable::createFromFormat('Ymd', $ymd, wp_timezone());
                        if ($dt instanceof DateTimeImmutable) {
                            $badge_day = wp_date('j', $dt->getTimestamp());
                            $badge_month = wp_date('M', $dt->getTimestamp());
                        }
                    }
                    $time_label = oven_whats_on_get_event_time_label($post_id);
                    $thumb = get_the_post_thumbnail_url($post_id, 'large');
                    if (!$thumb) {
                        $thumb = oven_placeholder_image(640, 400, 'oven-event-' . $post_id);
                    }
                    $excerpt = get_post_field('post_excerpt', $post_id);
                    $excerpt = is_string($excerpt) ? trim($excerpt) : '';
                    if ($excerpt === '') {
                        $excerpt = wp_trim_words(wp_strip_all_tags((string) get_post_field('post_content', $post_id)), 24);
                    }
                    ?>
                    <div class="col">
                        <article <?php post_class('oven-whats-on-card h-100', $post_id); ?>>
                            <a class="oven-whats-on-card__media" href="<?php the_permalink($post_id); ?>">
                                <img src="<?php echo esc_url($thumb); ?>"
                                    alt=""
                                    width="640"
                                    height="400"
                                    loading="lazy">
                                <?php if ($badge_day !== '') : ?>
                                    <span class="oven-whats-on-card__date-badge" aria-hidden="true">
                                        <span class="oven-whats-on-card__date-badge-day"><?php echo esc_html($badge_day); ?></span>
                                        <span class="oven-whats-on-card__date-badge-month"><?php echo esc_html($badge_month); ?></span>
                                    </span>
                                <?php endif; ?>
                                <span class="oven-whats-on-card__title-overlay">
                                    <?php echo esc_html(get_the_title($post_id)); ?>
                                </span>
                            </a>
                            <div class="oven-whats-on-card__body">
                                <div class="oven-whats-on-card__excerpt oven-prose">
                                    <p><?php echo esc_html($excerpt); ?></p>
                                </div>
                                <?php if ($time_label !== '') : ?>
                                    <p class="oven-whats-on-card__time">
                                        <span class="oven-whats-on-card__time-icon" aria-hidden="true"></span>
                                        <span><?php echo esc_html($time_label); ?></span>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
