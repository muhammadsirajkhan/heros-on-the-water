<?php
/**
 * Donate — every pound makes a difference.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('EVERY POUND MAKES A DIFFERENCE', 'heros-on-the-water'),
    'content'  => array(
        __('Many veterans face challenges such as isolation, stress, anxiety, and the transition to civilian life. Through peaceful outdoor activities and a supportive community, Heroes On The Water offers a place where they can reconnect with nature, build confidence, and form lasting friendships.', 'heros-on-the-water'),
        __('Your donation ensures these life-changing experiences remain free and accessible to every veteran who needs them.', 'heros-on-the-water'),
    ),
    'subtitle' => __('MORE THAN A DONATION', 'heros-on-the-water'),
    'closing'  => __('Every contribution helps create moments that can\'t be measured in numbers — new friendships, renewed confidence, peaceful conversations, and memories that remind veterans they are never alone.', 'heros-on-the-water'),
    'images'   => array(
        array(
            'src' => $uri . '/assets/images/donate/image-1.webp',
            'alt' => __('Donation presentation with Heroes on the Water banner', 'heros-on-the-water'),
        ),
        array(
            'src' => $uri . '/assets/images/donate/image-2.webp',
            'alt' => __('Community members receiving donated kitchen appliances', 'heros-on-the-water'),
        ),
        array(
            'src' => $uri . '/assets/images/donate/image-3.webp',
            'alt' => __('Supporters gathered around a long table at a community meeting', 'heros-on-the-water'),
        ),
    ),
);

$args   = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$images = isset($args['images']) && is_array($args['images']) ? $args['images'] : $defaults['images'];
?>
<section class="hotw-block hotw-donate-impact" id="content-start" aria-labelledby="hotw-donate-impact-title">
    <div class="container">
        <div class="hotw-donate-impact__grid">
            <div class="hotw-donate-collage">
                <?php if (!empty($images[0]['src'])) : ?>
                    <img
                        class="hotw-donate-collage__main"
                        src="<?php echo esc_url($images[0]['src']); ?>"
                        alt="<?php echo esc_attr(isset($images[0]['alt']) ? $images[0]['alt'] : ''); ?>"
                        width="480"
                        height="640"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endif; ?>
                <?php if (!empty($images[1]['src'])) : ?>
                    <img
                        class="hotw-donate-collage__side"
                        src="<?php echo esc_url($images[1]['src']); ?>"
                        alt="<?php echo esc_attr(isset($images[1]['alt']) ? $images[1]['alt'] : ''); ?>"
                        width="320"
                        height="280"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endif; ?>
                <?php if (!empty($images[2]['src'])) : ?>
                    <img
                        class="hotw-donate-collage__side"
                        src="<?php echo esc_url($images[2]['src']); ?>"
                        alt="<?php echo esc_attr(isset($images[2]['alt']) ? $images[2]['alt'] : ''); ?>"
                        width="320"
                        height="280"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endif; ?>
            </div>
            <div class="hotw-donate-impact__copy">
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
                <h2 class="hotw-section-title" id="hotw-donate-impact-title"><?php echo esc_html($args['title']); ?></h2>
                <div class="hotw-prose hotw-donate-impact__prose">
                    <?php foreach ($args['content'] as $para) : ?>
                        <p><?php echo esc_html($para); ?></p>
                    <?php endforeach; ?>
                </div>
                <h3 class="hotw-section-subtitle hotw-donate-impact__subtitle"><?php echo esc_html($args['subtitle']); ?></h3>
                <div class="hotw-prose hotw-donate-impact__prose">
                    <p><?php echo esc_html($args['closing']); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
