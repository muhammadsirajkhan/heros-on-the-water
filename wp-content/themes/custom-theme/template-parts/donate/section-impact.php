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
    'badge'     => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'     => __('EVERY POUND MAKES A DIFFERENCE', 'heros-on-the-water'),
    'content'   => array(
        __('Veterans often face isolation, trauma, and the challenge of rebuilding life after service. Your support funds equipment, volunteer training, and free days on the water.', 'heros-on-the-water'),
        __('Together we create safe, inclusive experiences that restore peace, purpose, and lasting connections.', 'heros-on-the-water'),
    ),
    'subtitle'  => __('MORE THAN A DONATION', 'heros-on-the-water'),
    'closing'   => __('Every contribution — large or small — helps another veteran find calm beyond the shore.', 'heros-on-the-water'),
    'images'    => array(
        $uri . '/assets/images/g10.png',
        $uri . '/assets/images/g11.png',
        $uri . '/assets/images/g12.png',
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--white hotw-donate-impact" id="content-start" aria-labelledby="hotw-donate-impact-title">
    <div class="container">
        <div class="hotw-donate-impact__grid">
            <div class="hotw-donate-collage" aria-hidden="true">
                <img class="hotw-donate-collage__main" src="<?php echo esc_url($args['images'][0]); ?>" alt="" width="480" height="640" loading="lazy">
                <img class="hotw-donate-collage__side" src="<?php echo esc_url($args['images'][1]); ?>" alt="" width="320" height="240" loading="lazy">
                <img class="hotw-donate-collage__side" src="<?php echo esc_url($args['images'][2]); ?>" alt="" width="320" height="240" loading="lazy">
            </div>
            <div class="hotw-donate-impact__copy">
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
                <h2 class="hotw-section-title" id="hotw-donate-impact-title"><?php echo esc_html($args['title']); ?></h2>
                <div class="hotw-prose">
                    <?php foreach ($args['content'] as $para) : ?>
                        <p><?php echo esc_html($para); ?></p>
                    <?php endforeach; ?>
                </div>
                <h3 class="hotw-section-subtitle"><?php echo esc_html($args['subtitle']); ?></h3>
                <div class="hotw-prose">
                    <p><?php echo esc_html($args['closing']); ?></p>
                </div>
                <a class="hotw-btn hotw-btn--yellow" href="#"><?php esc_html_e('Donate Now', 'heros-on-the-water'); ?></a>
            </div>
        </div>
    </div>
</section>
