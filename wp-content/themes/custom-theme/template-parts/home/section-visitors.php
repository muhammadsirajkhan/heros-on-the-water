<?php
/**
 * Home visitors carousel (Swiper + scrollbar).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$img_1 = $uri . '/assets/images/home/visitor-1.webp';
$img_2 = $uri . '/assets/images/home/visitor-2.webp';

$defaults = array(
    'badge'       => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'       => __('OUR VISITORS', 'heros-on-the-water'),
    'description' => __('We welcome all heroes and family members to our base, here are our latest figures of base visitors.', 'heros-on-the-water'),
    'visitors'    => array(
        array(
            'image' => $img_1,
            'label' => __('419 THIS YEAR\'S VISITORS SO FAR', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
        array(
            'image' => $img_2,
            'label' => __('4070 VISITORS IN 2023', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
        array(
            'image' => $img_1,
            'label' => __('1065 VISITORS IN 2022', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
        array(
            'image' => $img_2,
            'label' => __('242 LAST MONTH\'S VISITORS', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
        array(
            'image' => $img_1,
            'label' => __('FAMILY DAYS ON THE WATER', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
        array(
            'image' => $img_2,
            'label' => __('4070 VISITORS IN 2023', 'heros-on-the-water'),
            'url'   => home_url('/events/'),
        ),
    ),
);

$args     = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$visitors = is_array($args['visitors']) ? $args['visitors'] : $defaults['visitors'];
?>
<section class="hotw-block hotw-visitors" aria-labelledby="hotw-visitors-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-visitors-title"><?php echo esc_html($args['title']); ?></h2>
            <?php if (!empty($args['description'])) : ?>
                <p class="hotw-visitors__desc"><?php echo esc_html($args['description']); ?></p>
            <?php endif; ?>
        </header>
    </div>

    <div class="hotw-visitors__slider">
        <div class="swiper hotw-visitors-swiper-root">
            <div class="swiper-wrapper">
                <?php foreach ($visitors as $item) : ?>
                    <?php
                    $item_url   = !empty($item['url']) ? $item['url'] : home_url('/events/');
                    $item_image = !empty($item['image']) ? $item['image'] : $img_1;
                    $item_label = !empty($item['label']) ? $item['label'] : '';
                    ?>
                    <div class="swiper-slide">
                        <article class="hotw-visitors-card">
                            <div class="hotw-visitors-card__media">
                                <img
                                    class="hotw-visitors-card__img"
                                    src="<?php echo esc_url($item_image); ?>"
                                    alt=""
                                    width="640"
                                    height="420"
                                    loading="lazy"
                                >
                            </div>
                            <div class="hotw-visitors-card__meta">
                                <p class="hotw-visitors-card__label"><?php echo esc_html($item_label); ?></p>
                                <a
                                    class="hotw-visitors-card__btn"
                                    href="<?php echo esc_url($item_url); ?>"
                                    aria-label="<?php echo esc_attr(sprintf(__('View more: %s', 'heros-on-the-water'), $item_label)); ?>"
                                >
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                                        <path d="M7 17L17 7M17 7H8M17 7v9"/>
                                    </svg>
                                </a>
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
</section>
