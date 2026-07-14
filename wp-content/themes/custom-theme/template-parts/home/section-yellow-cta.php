<?php
/**
 * Home help / yellow CTA — overlapping panel on photo.
 *
 * ACF group: home_yellow_cta under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$cta = function_exists('get_field') ? get_field('home_yellow_cta') : null;
if (!is_array($cta)) {
    $cta = array();
}

$image            = (isset($cta['image']) && is_array($cta['image'])) ? $cta['image'] : null;
$title            = isset($cta['title']) ? (string) $cta['title'] : '';
$description      = isset($cta['description']) ? (string) $cta['description'] : '';
$rating           = isset($cta['rating']) ? (string) $cta['rating'] : '';
$primary_button   = (isset($cta['primary_button']) && is_array($cta['primary_button'])) ? $cta['primary_button'] : null;
$secondary_button = (isset($cta['secondary_button']) && is_array($cta['secondary_button'])) ? $cta['secondary_button'] : null;

$image_url = (!empty($image['url'])) ? $image['url'] : '';
$image_alt = (!empty($image['alt'])) ? $image['alt'] : '';

$primary_url    = (!empty($primary_button['url'])) ? $primary_button['url'] : '';
$primary_title  = (!empty($primary_button['title'])) ? $primary_button['title'] : '';
$primary_target = (!empty($primary_button['target'])) ? $primary_button['target'] : '';

$secondary_url    = (!empty($secondary_button['url'])) ? $secondary_button['url'] : '';
$secondary_title  = (!empty($secondary_button['title'])) ? $secondary_button['title'] : '';
$secondary_target = (!empty($secondary_button['target'])) ? $secondary_button['target'] : '';
?>
<section class="hotw-yellow-cta-wrap" aria-labelledby="hotw-help-title">
    <?php if ($image_url) : ?>
        <div class="hotw-yellow-cta-wrap__media">
            <img
                class="hotw-yellow-cta-wrap__img"
                src="<?php echo esc_url($image_url); ?>"
                alt="<?php echo esc_attr($image_alt); ?>"
                width="1918"
                height="960"
                loading="lazy"
            >
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="hotw-yellow-cta">
            <div class="hotw-yellow-cta__grid">
                <div class="hotw-yellow-cta__copy">
                    <?php if ($title !== '') : ?>
                        <h2 class="hotw-yellow-cta__title" id="hotw-help-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    <?php if ($description !== '') : ?>
                        <p class="hotw-yellow-cta__desc"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>

                <div class="hotw-yellow-cta__aside">
                    <?php if ($primary_url || $secondary_url) : ?>
                        <div class="hotw-yellow-cta__actions">
                            <?php if ($primary_url) : ?>
                                <a
                                    class="hotw-btn hotw-btn--black"
                                    href="<?php echo esc_url($primary_url); ?>"
                                    <?php echo $primary_target ? 'target="' . esc_attr($primary_target) . '"' : ''; ?>
                                    <?php echo $primary_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                >
                                    <?php echo esc_html($primary_title !== '' ? $primary_title : __('Donate', 'heros-on-the-water')); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($secondary_url) : ?>
                                <a
                                    class="hotw-btn hotw-btn--ghost"
                                    href="<?php echo esc_url($secondary_url); ?>"
                                    <?php echo $secondary_target ? 'target="' . esc_attr($secondary_target) . '"' : ''; ?>
                                    <?php echo $secondary_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                >
                                    <?php echo esc_html($secondary_title !== '' ? $secondary_title : __('Learn more', 'heros-on-the-water')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($rating !== '') : ?>
                        <div class="hotw-yellow-cta__rating">
                            <span class="hotw-yellow-cta__stars" aria-hidden="true">★★★★★</span>
                            <span class="hotw-yellow-cta__rating-text"><?php echo esc_html($rating); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
