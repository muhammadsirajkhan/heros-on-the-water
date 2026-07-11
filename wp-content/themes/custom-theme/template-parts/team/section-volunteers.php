<?php
/**
 * Team — volunteer hosts.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'      => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'      => __('VOLUNTEER HOSTS AT PORT SODERICK', 'heros-on-the-water'),
    'volunteers' => array(
        array(__('Founder', 'heros-on-the-water'), __('FOUNDER HOST', 'heros-on-the-water'), $uri . '/assets/images/g6.png', __('FOUNDER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('KAYAK LEAD', 'heros-on-the-water'), $uri . '/assets/images/g7.png', __('VOLUNTEER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('FISHING HOST', 'heros-on-the-water'), $uri . '/assets/images/g8.png', __('VOLUNTEER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('WELCOME HOST', 'heros-on-the-water'), $uri . '/assets/images/g9.png', __('VOLUNTEER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('SAFETY LEAD', 'heros-on-the-water'), $uri . '/assets/images/g10.png', __('VOLUNTEER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('EVENTS HOST', 'heros-on-the-water'), $uri . '/assets/images/g11.png', __('VOLUNTEER', 'heros-on-the-water')),
        array(__('Volunteer', 'heros-on-the-water'), __('COMMUNITY HOST', 'heros-on-the-water'), $uri . '/assets/images/g12.png', __('VOLUNTEER', 'heros-on-the-water')),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray" aria-labelledby="hotw-volunteers-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-volunteers-title"><?php echo esc_html($args['title']); ?></h2>
        </header>
        <div class="hotw-team-grid">
            <?php foreach ($args['volunteers'] as $person) : ?>
                <article class="hotw-team-card">
                    <div class="hotw-team-card__media">
                        <img class="hotw-team-card__img" src="<?php echo esc_url($person[2]); ?>" alt="" width="320" height="320" loading="lazy">
                        <span class="hotw-badge hotw-badge--navy hotw-team-card__tag"><?php echo esc_html($person[3]); ?></span>
                    </div>
                    <div class="hotw-team-card__body">
                        <p class="hotw-team-card__role"><?php echo esc_html($person[0]); ?></p>
                        <h3 class="hotw-team-card__name"><?php echo esc_html($person[1]); ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
