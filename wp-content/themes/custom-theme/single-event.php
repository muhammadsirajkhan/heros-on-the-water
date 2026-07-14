<?php
/**
 * Single Event — simple detail page (no interior banner).
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$events_url = get_post_type_archive_link('event');
if (!$events_url) {
    $events_url = home_url('/events/');
}
$events_pages = get_pages(
    array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'events-page.php',
        'number'     => 1,
    )
);
if (!empty($events_pages[0])) {
    $events_url = get_permalink($events_pages[0]->ID);
}

$icon_pin = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$icon_clock = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
$icon_cal = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
?>

<main id="primary" class="site-main hotw-main hotw-single-event">
    <?php
    while (have_posts()) :
        the_post();
        $post_id  = get_the_ID();
        $location = function_exists('hotw_get_event_location') ? hotw_get_event_location($post_id) : '';
        $time     = function_exists('hotw_get_event_time_display') ? hotw_get_event_time_display($post_id) : '';
        $ymd      = function_exists('hotw_get_event_date_ymd') ? hotw_get_event_date_ymd($post_id) : '';
        if ($ymd === '' && function_exists('hotw_whats_on_get_event_date_for_post')) {
            $ymd = hotw_whats_on_get_event_date_for_post($post_id);
        }
        $date_label = '';
        if ($ymd !== '') {
            $dt = DateTimeImmutable::createFromFormat('Ymd', $ymd, wp_timezone());
            if ($dt instanceof DateTimeImmutable) {
                $date_label = wp_date('l, j F Y', $dt->getTimestamp());
            }
        }
        ?>
        <div class="container hotw-single-event__inner">
            <a class="hotw-single-event__back" href="<?php echo esc_url($events_url); ?>">
                <span aria-hidden="true">←</span>
                <?php esc_html_e('Back to Events', 'heros-on-the-water'); ?>
            </a>

            <article <?php post_class('hotw-single-event__article'); ?> id="post-<?php the_ID(); ?>">
                <header class="hotw-single-event__header">
                    <span class="hotw-badge hotw-badge--blue"><?php esc_html_e('EVENT', 'heros-on-the-water'); ?></span>
                    <h1 class="hotw-single-event__title"><?php the_title(); ?></h1>

                    <ul class="hotw-single-event__meta">
                        <?php if ($date_label !== '') : ?>
                            <li class="hotw-single-event__meta-item">
                                <span class="hotw-single-event__meta-icon"><?php echo $icon_cal; ?></span>
                                <span><?php echo esc_html($date_label); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if ($location !== '') : ?>
                            <li class="hotw-single-event__meta-item">
                                <span class="hotw-single-event__meta-icon"><?php echo $icon_pin; ?></span>
                                <span><?php echo esc_html($location); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if ($time !== '') : ?>
                            <li class="hotw-single-event__meta-item">
                                <span class="hotw-single-event__meta-icon"><?php echo $icon_clock; ?></span>
                                <span><?php echo esc_html($time); ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <figure class="hotw-single-event__media">
                        <?php
                        the_post_thumbnail(
                            'large',
                            array(
                                'class'   => 'hotw-single-event__img',
                                'loading' => 'eager',
                            )
                        );
                        ?>
                    </figure>
                <?php endif; ?>

                <div class="hotw-single-event__content hotw-prose">
                    <?php the_content(); ?>
                </div>

                <footer class="hotw-single-event__footer">
                    <a class="hotw-btn hotw-btn--yellow" href="<?php echo esc_url($events_url); ?>">
                        <?php esc_html_e('View All Events', 'heros-on-the-water'); ?>
                    </a>
                </footer>
            </article>
        </div>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
