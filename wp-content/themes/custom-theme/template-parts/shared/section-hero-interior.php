<?php
/**
 * Shared interior page hero (badge + title + prose + background).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$args = (isset($args) && is_array($args)) ? $args : array();

$section_id  = isset($args['section_id']) ? (string) $args['section_id'] : '';
$badge       = isset($args['badge']) ? (string) $args['badge'] : '';
$title       = isset($args['title']) ? (string) $args['title'] : '';
$description = isset($args['description']) ? (string) $args['description'] : '';
$show_scroll = !empty($args['show_scroll']);
$bg          = (isset($args['bg']) && is_array($args['bg'])) ? $args['bg'] : array();
$bg_src      = isset($bg['src']) ? (string) $bg['src'] : '';
$bg_alt      = isset($bg['alt']) ? (string) $bg['alt'] : '';
?>
<section
    class="hotw-page-hero"
    <?php echo $section_id !== '' ? 'id="' . esc_attr($section_id) . '"' : ''; ?>
    aria-label="<?php echo esc_attr($title !== '' ? $title : __('Page hero', 'heros-on-the-water')); ?>"
>
    <div class="hotw-page-hero__media">
        <?php if ($bg_src !== '') : ?>
            <img
                class="hotw-page-hero__img"
                src="<?php echo esc_url($bg_src); ?>"
                alt="<?php echo esc_attr($bg_alt); ?>"
                width="1920"
                height="900"
                loading="eager"
                fetchpriority="high"
            >
        <?php endif; ?>
        <div class="hotw-page-hero__overlay" aria-hidden="true"></div>
    </div>
    <div class="container">
        <div class="hotw-page-hero__content">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--yellow"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h1 class="hotw-page-hero__title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>
            <?php if ($description !== '') : ?>
                <div class="hotw-page-hero__desc">
                    <p><?php echo esc_html($description); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($show_scroll) : ?>
        <a class="hotw-page-hero__scroll" href="#content-start" aria-label="<?php esc_attr_e('Scroll down', 'heros-on-the-water'); ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </a>
    <?php endif; ?>
</section>
