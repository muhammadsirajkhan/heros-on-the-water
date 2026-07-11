<?php
/**
 * Home help / yellow CTA — overlapping panel on photo.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'image'       => array(
        'src' => $uri . '/assets/images/home/help-more.webp',
        'alt' => __('Heroes on the Water community outside the base — Relax, Fish, Heal', 'heros-on-the-water'),
    ),
    'title'       => __('HELP MORE VETERANS FIND PEACE, PURPOSE & CONNECTION!', 'heros-on-the-water'),
    'description' => __('Every paddle stroke, every fishing trip, and every shared conversation helps veterans build stronger connections!', 'heros-on-the-water'),
    'donate_url'  => home_url('/donate/'),
    'events_url'  => home_url('/events/'),
    'rating'      => __('Happy Veteranss • Building Friendship.', 'heros-on-the-water'),
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$image = wp_parse_args(isset($args['image']) && is_array($args['image']) ? $args['image'] : array(), $defaults['image']);
?>
<section class="hotw-yellow-cta-wrap" aria-labelledby="hotw-help-title">
    <div class="hotw-yellow-cta-wrap__media">
        <img
            class="hotw-yellow-cta-wrap__img"
            src="<?php echo esc_url($image['src']); ?>"
            alt="<?php echo esc_attr($image['alt']); ?>"
            width="1918"
            height="960"
            loading="lazy"
        >
    </div>

    <div class="container">
        <div class="hotw-yellow-cta">
            <div class="hotw-yellow-cta__grid">
                <div class="hotw-yellow-cta__copy">
                    <h2 class="hotw-yellow-cta__title" id="hotw-help-title"><?php echo esc_html($args['title']); ?></h2>
                    <?php if (!empty($args['description'])) : ?>
                        <p class="hotw-yellow-cta__desc"><?php echo esc_html($args['description']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="hotw-yellow-cta__aside">
                    <div class="hotw-yellow-cta__actions">
                        <a class="hotw-btn hotw-btn--black" href="<?php echo esc_url($args['donate_url']); ?>">
                            <?php esc_html_e('DONATE NOW', 'heros-on-the-water'); ?>
                        </a>
                        <a class="hotw-btn hotw-btn--ghost" href="<?php echo esc_url($args['events_url']); ?>">
                            <?php esc_html_e('JOIN AN EVENT', 'heros-on-the-water'); ?>
                        </a>
                    </div>
                    <div class="hotw-yellow-cta__rating">
                        <span class="hotw-yellow-cta__stars" aria-hidden="true">★★★★★</span>
                        <span class="hotw-yellow-cta__rating-text"><?php echo esc_html($args['rating']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
