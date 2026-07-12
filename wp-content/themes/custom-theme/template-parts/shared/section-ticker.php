<?php
/**
 * Shared values ticker — Swiper continuous marquee.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$defaults = array(
    'items' => array(
        __('FREE FOR VETERANS', 'heros-on-the-water'),
        __('VOLUNTEER-LED CHARITY', 'heros-on-the-water'),
        __('BUILDING STRONGER COMMUNITIES', 'heros-on-the-water'),
        __('SAFE & INCLUSIVE ENVIRONMENT', 'heros-on-the-water'),
        __('CREATING LASTING CONNECTIONS', 'heros-on-the-water'),
        __('MAKING A MEASURABLE IMPACT', 'heros-on-the-water'),
        __('HOPE BEYOND SERVICE', 'heros-on-the-water'),
        __('FREE FOR VETERANS', 'heros-on-the-water'),
        __('VOLUNTEER-LED CHARITY', 'heros-on-the-water'),
        __('BUILDING STRONGER COMMUNITIES', 'heros-on-the-water'),
        __('SAFE & INCLUSIVE ENVIRONMENT', 'heros-on-the-water'),
        __('CREATING LASTING CONNECTIONS', 'heros-on-the-water'),
        __('MAKING A MEASURABLE IMPACT', 'heros-on-the-water'),
        __('HOPE BEYOND SERVICE', 'heros-on-the-water'),
    ),
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$items = is_array($args['items']) ? $args['items'] : $defaults['items'];
/* Extra copies so Swiper loop + slidesPerView:auto always has overflow. */
$loop  = array_merge($items, $items, $items);
?>
<div class="hotw-ticker" role="presentation" aria-hidden="true">
    <div class="swiper hotw-ticker-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($loop as $item) : ?>
                <div class="swiper-slide hotw-ticker__slide">
                    <span class="hotw-ticker__item"><?php echo esc_html($item); ?></span>
                    <span class="hotw-ticker__star" aria-hidden="true">★</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
