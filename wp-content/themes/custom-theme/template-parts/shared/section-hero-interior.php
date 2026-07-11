<?php
/**
 * Shared interior page hero (badge + title + prose + background).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$defaults = array(
    'section_id'    => '',
    'badge'         => '',
    'title'         => '',
    'description'   => '',
    'show_scroll'   => false,
    'bg'            => array(
        'src' => hotw_placeholder_image(1920, 900, 'hotw-hero'),
        'alt' => '',
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$bg   = wp_parse_args(isset($args['bg']) && is_array($args['bg']) ? $args['bg'] : array(), $defaults['bg']);
?>
<section
    class="hotw-page-hero"
    <?php echo $args['section_id'] ? 'id="' . esc_attr($args['section_id']) . '"' : ''; ?>
    aria-label="<?php echo esc_attr($args['title'] ? $args['title'] : __('Page hero', 'heros-on-the-water')); ?>"
>
    <div class="hotw-page-hero__media">
        <img
            class="hotw-page-hero__img"
            src="<?php echo esc_url($bg['src']); ?>"
            alt="<?php echo esc_attr($bg['alt']); ?>"
            width="1920"
            height="900"
            loading="eager"
            fetchpriority="high"
        >
        <div class="hotw-page-hero__overlay" aria-hidden="true"></div>
    </div>
    <div class="container">
        <div class="hotw-page-hero__content">
            <?php if ($args['badge']) : ?>
                <span class="hotw-badge hotw-badge--yellow"><?php echo esc_html($args['badge']); ?></span>
            <?php endif; ?>
            <?php if ($args['title']) : ?>
                <h1 class="hotw-page-hero__title"><?php echo esc_html($args['title']); ?></h1>
            <?php endif; ?>
            <?php if ($args['description']) : ?>
                <div class="hotw-page-hero__desc">
                    <p><?php echo esc_html($args['description']); ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($args['show_scroll'])) : ?>
                <a class="hotw-page-hero__scroll" href="#content-start" aria-label="<?php esc_attr_e('Scroll down', 'heros-on-the-water'); ?>">
                    <span aria-hidden="true">↓</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
