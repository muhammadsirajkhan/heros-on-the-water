<?php
/**
 * Port Soderick opening times.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'       => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'       => __("PORT SODERICK\nOPENING TIMES!!", 'heros-on-the-water'),
    'description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua.', 'heros-on-the-water'),
    'image'       => array(
        'src' => $uri . '/assets/images/home/port.webp',
        'alt' => __('Adirondack chairs on the dock at Port Soderick overlooking the water', 'heros-on-the-water'),
    ),
    'hours'       => array(
        array(__('MONDAY', 'heros-on-the-water'), __('CLOSED', 'heros-on-the-water')),
        array(__('TUESDAY', 'heros-on-the-water'), __('10:00 AM - 2:00 PM', 'heros-on-the-water')),
        array(__('WEDNESDAY', 'heros-on-the-water'), __('10:00 AM - 2:00 PM', 'heros-on-the-water')),
        array(__('THURSDAY', 'heros-on-the-water'), __('10:00 AM - 2:00 PM', 'heros-on-the-water')),
        array(__('FRIDAY', 'heros-on-the-water'), __('10:00 AM - 2:00 PM', 'heros-on-the-water')),
        array(__('SATURDAY', 'heros-on-the-water'), __('10:00 AM - 2:00 PM', 'heros-on-the-water')),
        array(__('SUNDAY', 'heros-on-the-water'), __('CLOSED', 'heros-on-the-water')),
    ),
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$image = wp_parse_args(isset($args['image']) && is_array($args['image']) ? $args['image'] : array(), $defaults['image']);

$icon_calendar = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
$icon_clock    = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
?>
<section class="hotw-block hotw-block--white hotw-hours" aria-labelledby="hotw-hours-title">
    <div class="container">
        <div class="hotw-hours__grid">
            <div class="hotw-hours__media">
                <img
                    class="hotw-hours__img"
                    src="<?php echo esc_url($image['src']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    width="814"
                    height="756"
                    loading="lazy"
                >
            </div>
            <div class="hotw-hours__copy">
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
                <h2 class="hotw-section-title hotw-hours__title" id="hotw-hours-title"><?php echo nl2br(esc_html($args['title']), false); ?></h2>
                <?php if (!empty($args['description'])) : ?>
                    <p class="hotw-hours__desc"><?php echo esc_html($args['description']); ?></p>
                <?php endif; ?>
                <ul class="hotw-hours__list">
                    <?php foreach ($args['hours'] as $row) : ?>
                        <li class="hotw-hours__row">
                            <span class="hotw-hours__day">
                                <span class="hotw-hours__icon" aria-hidden="true"><?php echo $icon_calendar; ?></span>
                                <?php echo esc_html($row[0]); ?>
                            </span>
                            <span class="hotw-hours__time">
                                <span class="hotw-hours__icon" aria-hidden="true"><?php echo $icon_clock; ?></span>
                                <?php echo esc_html($row[1]); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
