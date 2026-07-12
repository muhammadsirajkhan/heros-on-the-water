<?php
/**
 * Full-bleed group photo band (Relax / Fish / Heal).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$defaults = array(
    'src' => get_template_directory_uri() . '/assets/images/home/help-more.webp',
    'alt' => __('Heroes on the Water community at Port Soderick', 'heros-on-the-water'),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-group-photo" aria-label="<?php esc_attr_e('Community photo', 'heros-on-the-water'); ?>">
    <img
        class="hotw-group-photo__img"
        src="<?php echo esc_url($args['src']); ?>"
        alt="<?php echo esc_attr($args['alt']); ?>"
        width="1920"
        height="700"
        loading="lazy"
    >
</section>
