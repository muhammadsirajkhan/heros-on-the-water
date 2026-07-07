<?php
/**
 * What's On — two-month calendar (current + next).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

/*
 * $months and $day_map are set by page-whats-on.php before this file is required (same scope).
 */
$months = (isset($months) && is_array($months)) ? $months : array();
$day_map = (isset($day_map) && is_array($day_map)) ? $day_map : array();

if ($months === array()) {
    $tz = wp_timezone();
    $months = array(
        new DateTimeImmutable('first day of this month', $tz),
        (new DateTimeImmutable('first day of this month', $tz))->modify('+1 month'),
    );
}

$today_ymd = wp_date('Ymd');

$pin_rel = '/assets/images/pin-calender.png';
$pin_path = get_template_directory() . $pin_rel;
$pin_uri = isset($pin_url) ? (string) $pin_url : (get_template_directory_uri() . $pin_rel);
$pin_style_attr = '';
if (is_readable($pin_path)) {
    $pin_style_attr = ' style="' . esc_attr('--hotw-pin-cal:url(' . esc_url($pin_uri) . ')') . '"';
}

$day_headers = array(
    strtoupper(esc_html__('Sunday', 'heros-on-the-water')),
    strtoupper(esc_html__('Monday', 'heros-on-the-water')),
    strtoupper(esc_html__('Tuesday', 'heros-on-the-water')),
    strtoupper(esc_html__('Wednesday', 'heros-on-the-water')),
    strtoupper(esc_html__('Thursday', 'heros-on-the-water')),
    strtoupper(esc_html__('Friday', 'heros-on-the-water')),
    strtoupper(esc_html__('Saturday', 'heros-on-the-water')),
);

?>
<section class="hotw-section hotw-whats-on__calendar-section" aria-labelledby="whats-on-calendar-heading">
    <div class="container">
        <h2 id="whats-on-calendar-heading" class="screen-reader-text">
            <?php esc_html_e('Events calendar', 'heros-on-the-water'); ?>
        </h2>
        <div class="hotw-whats-on-calendar"<?php echo $pin_style_attr; ?>>
            <?php
            $panel_index = 0;
            foreach ($months as $month_start) {
                if (!$month_start instanceof DateTimeImmutable) {
                    continue;
                }
                ++$panel_index;
                $leading = (int) $month_start->format('w');
                $last_day = (int) $month_start->format('t');
                $cells = array();
                for ($i = 0; $i < $leading; $i++) {
                    $cells[] = null;
                }
                for ($d = 1; $d <= $last_day; $d++) {
                    $cells[] = $d;
                }
                while (count($cells) % 7 !== 0) {
                    $cells[] = null;
                }
                $rows = array_chunk($cells, 7);
                $title = wp_date('F Y', $month_start->getTimestamp());
                ?>
                <div class="hotw-whats-on-calendar__panel">
                    <h3 class="hotw-whats-on-calendar__month-title"><?php echo esc_html($title); ?></h3>
                    <div class="hotw-whats-on-calendar__weekdays">
                        <?php foreach ($day_headers as $label) : ?>
                            <span class="hotw-whats-on-calendar__weekday"><?php echo esc_html($label); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="hotw-whats-on-calendar__grid" aria-label="<?php echo esc_attr($title); ?>">
                        <?php foreach ($rows as $row) : ?>
                            <div class="hotw-whats-on-calendar__row">
                                <?php
                                foreach ($row as $d) {
                                    if ($d === null) {
                                        echo '<div class="hotw-whats-on-calendar__cell hotw-whats-on-calendar__cell--empty" aria-hidden="true"></div>';
                                        continue;
                                    }
                                    $cell_date = $month_start->modify('+' . ((int) $d - 1) . ' days');
                                    $ymd = $cell_date->format('Ymd');
                                    $is_sunday = (int) $cell_date->format('w') === 0;
                                    $is_today = ($ymd === $today_ymd);
                                    $has_events = !empty($day_map[$ymd]);

                                    $classes = array('hotw-whats-on-calendar__cell');
                                    if ($is_sunday) {
                                        $classes[] = 'hotw-whats-on-calendar__cell--sunday';
                                    }
                                    $show_pin = false;
                                    if ($is_today && $has_events) {
                                        $classes[] = 'hotw-whats-on-calendar__cell--today-event';
                                        $show_pin = true;
                                    } elseif ($is_today) {
                                        $classes[] = 'hotw-whats-on-calendar__cell--today';
                                        $show_pin = true;
                                    } elseif ($has_events) {
                                        $classes[] = 'hotw-whats-on-calendar__cell--event';
                                    }

                                    $class_attr = implode(' ', $classes);
                                    $daynum = '<span class="hotw-whats-on-calendar__daynum">' . esc_html((string) (int) $d) . '</span>';
                                    $pin_html = $show_pin ? '<span class="hotw-whats-on-calendar__pin" aria-hidden="true"></span>' : '';
                                    $inner = $daynum . $pin_html;

                                    if ($has_events) {
                                        $first = $day_map[$ymd][0];
                                        $url = get_permalink($first->ID);
                                        $label = sprintf(
                                            /* translators: %s: calendar date */
                                            __('Events on %s', 'heros-on-the-water'),
                                            wp_date(get_option('date_format'), $cell_date->getTimestamp())
                                        );
                                        echo '<a class="' . esc_attr($class_attr) . '" href="' . esc_url($url) . '" aria-label="' . esc_attr($label) . '">' . $inner . '</a>';
                                    } else {
                                        echo '<div class="' . esc_attr($class_attr) . '">' . $inner . '</div>';
                                    }
                                }
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if ($panel_index < count($months)) : ?>
                    <div class="hotw-whats-on-calendar__divider" aria-hidden="true"></div>
                <?php endif; ?>
            <?php } ?>
        </div>
    </div>
</section>
