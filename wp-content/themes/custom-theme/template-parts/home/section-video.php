<?php
/**
 * Home video / Our Mission YouTube section.
 *
 * ACF group: home_video under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$video = function_exists('get_field') ? get_field('home_video') : null;
if (!is_array($video)) {
    $video = array();
}

$image      = (isset($video['image']) && is_array($video['image'])) ? $video['image'] : null;
$label      = isset($video['label']) ? (string) $video['label'] : '';
$youtube_id = isset($video['youtube_id']) ? (string) $video['youtube_id'] : '';

$image_url = (!empty($image['url'])) ? $image['url'] : '';
$image_alt = (!empty($image['alt'])) ? $image['alt'] : '';
$play_icon = get_template_directory_uri() . '/assets/images/home/youtube-icon.webp';
$modal_id  = 'hotwHomeVideoModal';
?>
<section class="hotw-video-band" aria-label="<?php echo esc_attr($label !== '' ? $label : __('Video', 'heros-on-the-water')); ?>">
    <div class="container">
        <?php if ($image_url || $youtube_id) : ?>
            <button
                type="button"
                class="hotw-video-band__card"
                data-bs-toggle="modal"
                data-bs-target="#<?php echo esc_attr($modal_id); ?>"
                aria-label="<?php echo esc_attr(sprintf(__('Play %s video', 'heros-on-the-water'), $label !== '' ? $label : __('mission', 'heros-on-the-water'))); ?>"
            >
                <?php if ($image_url) : ?>
                    <img
                        class="hotw-video-band__img"
                        src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr($image_alt); ?>"
                        width="1280"
                        height="720"
                        loading="lazy"
                    >
                <?php endif; ?>
                <?php if ($label !== '') : ?>
                    <span class="hotw-video-band__label"><?php echo esc_html($label); ?></span>
                <?php endif; ?>
                <span class="hotw-video-band__play" aria-hidden="true">
                    <img
                        class="hotw-video-band__play-icon"
                        src="<?php echo esc_url($play_icon); ?>"
                        alt=""
                        width="88"
                        height="62"
                        loading="lazy"
                    >
                </span>
            </button>
        <?php endif; ?>
    </div>
</section>

<?php if ($youtube_id !== '') : ?>
    <div
        class="modal fade hotw-youtube-modal"
        id="<?php echo esc_attr($modal_id); ?>"
        tabindex="-1"
        aria-hidden="true"
        data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
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
                            title="<?php echo esc_attr($label !== '' ? $label : __('Heroes on the Water video', 'heros-on-the-water')); ?>"
                            src=""
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
