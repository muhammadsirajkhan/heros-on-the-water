<?php
/**
 * Home mission section.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'     => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'     => __('OUR MISSION', 'heros-on-the-water'),
    'subtitle'  => __('PADDLE FISH HEAL * FREEDOM CAPTURED.', 'heros-on-the-water'),
    'content'   => __('Heroes on the Water Isle of Man is a Charity That Provides Kayak Angling to Our Wounded Military & Uniformed Members of Public Who Have Suffered Out a Public Duty.', 'heros-on-the-water'),
    'quote'     => __('We Provide Physical & Therapeutic Rehabilitation Help Societies Heroes and Confidence.', 'heros-on-the-water'),
    'cta_label' => __('DONATE HERE', 'heros-on-the-water'),
    'cta_url'   => home_url('/donate/'),
    'image'     => array(
        'src' => $uri . '/assets/images/home/mission.webp',
        'alt' => __('Heroes on the Water community group holding a Samaritans banner at sunset', 'heros-on-the-water'),
    ),
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$image = wp_parse_args(isset($args['image']) && is_array($args['image']) ? $args['image'] : array(), $defaults['image']);
?>
<section class="hotw-block hotw-mission" id="content-start" aria-labelledby="hotw-mission-title">
    <div class="container">
        <div class="hotw-mission__grid">
            <div class="hotw-mission__copy">
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
                <h2 class="hotw-section-title" id="hotw-mission-title"><?php echo esc_html($args['title']); ?></h2>
                <p class="hotw-section-subtitle"><?php echo esc_html($args['subtitle']); ?></p>
                <div class="hotw-prose hotw-mission__prose">
                    <p><?php echo esc_html($args['content']); ?></p>
                </div>
                <p class="hotw-mission__quote"><?php echo esc_html($args['quote']); ?></p>
                <a class="hotw-btn hotw-mission__cta" href="<?php echo esc_url($args['cta_url']); ?>">
                    <span><?php echo esc_html($args['cta_label']); ?></span>
                    <span class="hotw-mission__cta-icon" aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </span>
                </a>
            </div>
            <div class="hotw-mission__media">
                <img
                    class="hotw-mission__img"
                    src="<?php echo esc_url($image['src']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    width="800"
                    height="600"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
</section>
