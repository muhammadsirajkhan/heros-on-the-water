<?php
/**
 * Home visitors carousel (Swiper + scrollbar).
 *
 * ACF group: home_visitors under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('home_visitors') : null;
if (!is_array($section)) {
    $section = array();
}

$badge       = isset($section['badge']) ? (string) $section['badge'] : '';
$title       = isset($section['title']) ? (string) $section['title'] : '';
$description = isset($section['description']) ? (string) $section['description'] : '';
$items       = (!empty($section['items']) && is_array($section['items'])) ? $section['items'] : array();
?>
<section class="hotw-block hotw-visitors" aria-labelledby="hotw-visitors-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title" id="hotw-visitors-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($description !== '') : ?>
                <p class="hotw-visitors__desc"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </header>
    </div>

    <?php if ($items) : ?>
        <div class="hotw-visitors__slider">
            <div class="swiper hotw-visitors-swiper-root">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item) : ?>
                        <?php
                        if (!is_array($item)) {
                            continue;
                        }
                        $item_image = (isset($item['image']) && is_array($item['image'])) ? $item['image'] : null;
                        $item_label = isset($item['label']) ? (string) $item['label'] : '';
                        $item_link  = (isset($item['link']) && is_array($item['link'])) ? $item['link'] : null;
                        $item_url   = (!empty($item_link['url'])) ? $item_link['url'] : '';
                        $item_target = (!empty($item_link['target'])) ? $item_link['target'] : '';
                        $img_url    = (!empty($item_image['url'])) ? $item_image['url'] : '';
                        $img_alt    = (!empty($item_image['alt'])) ? $item_image['alt'] : '';
                        if ($img_url === '' && $item_label === '') {
                            continue;
                        }
                        ?>
                        <div class="swiper-slide">
                            <article class="hotw-visitors-card">
                                <?php if ($img_url) : ?>
                                    <div class="hotw-visitors-card__media">
                                        <img
                                            class="hotw-visitors-card__img"
                                            src="<?php echo esc_url($img_url); ?>"
                                            alt="<?php echo esc_attr($img_alt); ?>"
                                            width="640"
                                            height="420"
                                            loading="lazy"
                                        >
                                    </div>
                                <?php endif; ?>
                                <div class="hotw-visitors-card__meta">
                                    <?php if ($item_label !== '') : ?>
                                        <p class="hotw-visitors-card__label"><?php echo esc_html($item_label); ?></p>
                                    <?php endif; ?>
                                    <?php if ($item_url) : ?>
                                        <a
                                            class="hotw-visitors-card__btn"
                                            href="<?php echo esc_url($item_url); ?>"
                                            <?php echo $item_target ? 'target="' . esc_attr($item_target) . '"' : ''; ?>
                                            <?php echo $item_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                            aria-label="<?php echo esc_attr(sprintf(__('View more: %s', 'heros-on-the-water'), $item_label !== '' ? $item_label : __('visitor', 'heros-on-the-water'))); ?>"
                                        >
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                                                <path d="M7 17L17 7M17 7H8M17 7v9"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="hotw-visitors__controls">
                    <button type="button" class="hotw-visitors__nav hotw-visitors__nav--prev" aria-label="<?php esc_attr_e('Previous visitors', 'heros-on-the-water'); ?>">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <div class="swiper-scrollbar hotw-visitors__scrollbar"></div>
                    <button type="button" class="hotw-visitors__nav hotw-visitors__nav--next" aria-label="<?php esc_attr_e('Next visitors', 'heros-on-the-water'); ?>">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
