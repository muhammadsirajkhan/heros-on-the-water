<?php
/**
 * Full-bleed group photo band (Relax / Fish / Heal).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$args = (isset($args) && is_array($args)) ? $args : array();
$src  = isset($args['src']) ? (string) $args['src'] : '';
$alt  = isset($args['alt']) ? (string) $args['alt'] : '';

if ($src === '') {
    return;
}
?>
<section class="hotw-group-photo" aria-label="<?php esc_attr_e('Community photo', 'heros-on-the-water'); ?>">
    <img
        class="hotw-group-photo__img"
        src="<?php echo esc_url($src); ?>"
        alt="<?php echo esc_attr($alt); ?>"
        width="1920"
        height="700"
        loading="lazy"
    >
</section>
