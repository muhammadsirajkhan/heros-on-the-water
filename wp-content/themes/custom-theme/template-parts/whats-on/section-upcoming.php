<?php
/**
 * What's On — upcoming events card grid.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$upcoming_posts = (isset($upcoming_posts) && is_array($upcoming_posts)) ? $upcoming_posts : array();
?>
<section class="hotw-section hotw-whats-on__upcoming-section" id="upcoming-events">
    <div class="container">
        <header class="hotw-whats-on-upcoming__header text-center mb-4 mb-lg-5">
            <p class="hotw-kicker"><?php esc_html_e('Heroes on the Water', 'heros-on-the-water'); ?></p>
            <h2 class="hotw-title hotw-whats-on-upcoming__title">
                <?php esc_html_e('Our upcoming', 'heros-on-the-water'); ?>
                <strong><?php esc_html_e('Events', 'heros-on-the-water'); ?></strong>
            </h2>
        </header>

        <?php if ($upcoming_posts === array()) : ?>
            <p class="hotw-whats-on-upcoming__empty text-center text-muted">
                <?php esc_html_e('No upcoming events right now. Check back soon.', 'heros-on-the-water'); ?>
            </p>
        <?php else : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                <?php
                foreach ($upcoming_posts as $post) {
                    $post_id = (int) $post->ID;
                    $ymd = hotw_whats_on_get_event_date_for_post($post_id);
                    $badge_day = '';
                    $badge_month = '';
                    if ($ymd !== '') {
                        $dt = DateTimeImmutable::createFromFormat('Ymd', $ymd, wp_timezone());
                        if ($dt instanceof DateTimeImmutable) {
                            $badge_day = wp_date('j', $dt->getTimestamp());
                            $badge_month = wp_date('M', $dt->getTimestamp());
                        }
                    }
                    $time_label = hotw_whats_on_get_event_time_label($post_id);
                    $thumb = get_the_post_thumbnail_url($post_id, 'large');
                    if (!$thumb) {
                        $thumb = hotw_placeholder_image(640, 400, 'hotw-event-' . $post_id);
                    }
                    $excerpt = get_post_field('post_excerpt', $post_id);
                    $excerpt = is_string($excerpt) ? trim($excerpt) : '';
                    if ($excerpt === '') {
                        $excerpt = wp_trim_words(wp_strip_all_tags((string) get_post_field('post_content', $post_id)), 24);
                    }
                    ?>
                    <div class="col">
                        <article <?php post_class('hotw-whats-on-card h-100', $post_id); ?>>
                            <a class="hotw-whats-on-card__media" href="<?php the_permalink($post_id); ?>">
                                <img src="<?php echo esc_url($thumb); ?>"
                                    alt=""
                                    width="640"
                                    height="400"
                                    loading="lazy">
                                <?php if ($badge_day !== '') : ?>
                                    <span class="hotw-whats-on-card__date-badge" aria-hidden="true">
                                        <span class="hotw-whats-on-card__date-badge-day"><?php echo esc_html($badge_day); ?></span>
                                        <span class="hotw-whats-on-card__date-badge-month"><?php echo esc_html($badge_month); ?></span>
                                    </span>
                                <?php endif; ?>
                                <span class="hotw-whats-on-card__title-overlay">
                                    <?php echo esc_html(get_the_title($post_id)); ?>
                                </span>
                            </a>
                            <div class="hotw-whats-on-card__body">
                                <div class="hotw-whats-on-card__excerpt hotw-prose">
                                    <p><?php echo esc_html($excerpt); ?></p>
                                </div>
                                <?php if ($time_label !== '') : ?>
                                    <p class="hotw-whats-on-card__time">
                                        <span class="hotw-whats-on-card__time-icon" aria-hidden="true"></span>
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
