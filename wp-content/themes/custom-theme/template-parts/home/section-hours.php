<?php
/**
 * Port Soderick opening times.
 *
 * ACF group: home_hours under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$hours_section = function_exists('get_field') ? get_field('home_hours') : null;
if (!is_array($hours_section)) {
    $hours_section = array();
}

$image       = (isset($hours_section['image']) && is_array($hours_section['image'])) ? $hours_section['image'] : null;
$badge       = isset($hours_section['badge']) ? (string) $hours_section['badge'] : '';
$title       = isset($hours_section['title']) ? (string) $hours_section['title'] : '';
$description = isset($hours_section['description']) ? (string) $hours_section['description'] : '';
$hours       = (!empty($hours_section['hours']) && is_array($hours_section['hours'])) ? $hours_section['hours'] : array();

$image_url = (!empty($image['url'])) ? $image['url'] : '';
$image_alt = (!empty($image['alt'])) ? $image['alt'] : '';

$icon_calendar = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
$icon_clock    = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
?>
<section class="hotw-block hotw-block--white hotw-hours" aria-labelledby="hotw-hours-title">
    <div class="container">
        <div class="hotw-hours__grid">
            <div class="hotw-hours__media">
                <?php if ($image_url) : ?>
                    <img
                        class="hotw-hours__img"
                        src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr($image_alt); ?>"
                        width="814"
                        height="756"
                        loading="lazy"
                    >
                <?php endif; ?>
            </div>
            <div class="hotw-hours__copy">
                <?php if ($badge !== '') : ?>
                    <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <?php if ($title !== '') : ?>
                    <h2 class="hotw-section-title hotw-hours__title" id="hotw-hours-title"><?php echo nl2br(esc_html($title), false); ?></h2>
                <?php endif; ?>
                <?php if ($description !== '') : ?>
                    <p class="hotw-hours__desc"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
                <?php if ($hours) : ?>
                    <ul class="hotw-hours__list">
                        <?php foreach ($hours as $row) : ?>
                            <?php
                            if (!is_array($row)) {
                                continue;
                            }
                            $day  = isset($row['day']) ? (string) $row['day'] : '';
                            $time = isset($row['time']) ? (string) $row['time'] : '';
                            if ($day === '' && $time === '') {
                                continue;
                            }
                            ?>
                            <li class="hotw-hours__row">
                                <span class="hotw-hours__day">
                                    <span class="hotw-hours__icon" aria-hidden="true"><?php echo $icon_calendar; ?></span>
                                    <?php echo esc_html($day); ?>
                                </span>
                                <span class="hotw-hours__time">
                                    <span class="hotw-hours__icon" aria-hidden="true"><?php echo $icon_clock; ?></span>
                                    <?php echo esc_html($time); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
