<?php
/**
 * Home video / Our Mission YouTube section.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'label'      => __('Our Mission', 'heros-on-the-water'),
    'image'      => array(
        'src' => $uri . '/assets/images/home/youtube-thumbnail.webp',
        'alt' => __('Heroes on the Water community group on the beach', 'heros-on-the-water'),
    ),
    'play_icon'  => $uri . '/assets/images/home/youtube-icon.webp',
    'youtube_id' => 'K4TOrB7at0Y',
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$image = wp_parse_args(isset($args['image']) && is_array($args['image']) ? $args['image'] : array(), $defaults['image']);
$modal_id = 'hotwHomeVideoModal';
?>
<section class="hotw-video-band" aria-label="<?php esc_attr_e('Our Mission video', 'heros-on-the-water'); ?>">
    <div class="container">
        <button
            type="button"
            class="hotw-video-band__card"
            data-bs-toggle="modal"
            data-bs-target="#<?php echo esc_attr($modal_id); ?>"
            aria-label="<?php esc_attr_e('Play Our Mission video', 'heros-on-the-water'); ?>"
        >
            <img
                class="hotw-video-band__img"
                src="<?php echo esc_url($image['src']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>"
                width="1280"
                height="720"
                loading="lazy"
            >
            <span class="hotw-video-band__label"><?php echo esc_html($args['label']); ?></span>
            <span class="hotw-video-band__play" aria-hidden="true">
                <img
                    class="hotw-video-band__play-icon"
                    src="<?php echo esc_url($args['play_icon']); ?>"
                    alt=""
                    width="88"
                    height="62"
                    loading="lazy"
                >
            </span>
        </button>
    </div>
</section>

<div
    class="modal fade hotw-youtube-modal"
    id="<?php echo esc_attr($modal_id); ?>"
    tabindex="-1"
    aria-hidden="true"
    data-youtube-id="<?php echo esc_attr($args['youtube_id']); ?>"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0">
            <div class="modal-body p-0">
                <button
                    type="button"
                    class="hotw-youtube-modal__close"
                    data-bs-dismiss="modal"
                    aria-label="<?php esc_attr_e('Close video', 'heros-on-the-water'); ?>"
                ></button>
                <div class="ratio ratio-16x9">
                    <iframe
                        class="hotw-youtube-modal__iframe border-0"
                        title="<?php esc_attr_e('Heroes on the Water video', 'heros-on-the-water'); ?>"
                        src=""
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
