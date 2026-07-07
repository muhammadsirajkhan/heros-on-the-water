<?php
/**
 * Experience / vibe section.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

$group = oven_placeholder_image(900, 640, 'oven-vibe-group');
$video = oven_placeholder_image(480, 320, 'oven-vibe-video');
$vibe_youtube_id = 'K4TOrB7at0Y';
?>

<?php
$good_times = get_field('good_times');
$image = $good_times['image'];
$youtube_video = $good_times['youtube_video'];
$sub_title = $good_times['sub_title'];
$title = $good_times['title'];
$content = $good_times['content'];
$items = $good_times['items'];
?>

<section class="oven-section" id="experience">
    <div class="container">
        <div class="row align-items-center justify-content-around g-4 g-lg-5">
            <div class="col-xl-4 col-md-6">
                <p class="oven-kicker"><?php echo $sub_title; ?></p>
                <h2 class="oven-title"><?php echo $title; ?>

                </h2>
                <div class="oven-prose mt-4 mb-4">
                    <?php echo $content; ?>
                </div>
                <ul class="oven-checklist">
                    <?php foreach ($items as $item): ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/forth-2.png" alt=""
                                class="img-fluid"> <?php echo $item['item']; ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="col-lg-6">
                <div class="oven-vibe-media">
                    <div class="oven-vibe-media__main">
                        <a href="#" class="d-inline-block" role="button" data-bs-toggle="modal"
                            data-bs-target="#ovenVibeYoutubeModal"
                            aria-label="<?php esc_attr_e('Play video', 'the-black-door-oven'); ?>">
                            <img src="<?php echo $image['url']; ?>" alt="" width="778" height="941" loading="lazy">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="ovenVibeYoutubeModal" tabindex="-1" aria-labelledby="ovenVibeYoutubeModalLabel"
    aria-hidden="true" data-youtube-id="<?php echo esc_attr($youtube_video); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h2 class="modal-title h5" id="ovenVibeYoutubeModalLabel">
                    <?php esc_html_e('Video', 'the-black-door-oven'); ?>
                </h2>
            </div> -->
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="<?php esc_attr_e('Close', 'the-black-door-oven'); ?>"></button>
                <div class="ratio ratio-16x9">
                    <iframe id="ovenVibeYoutubeIframe" class="border-0"
                        title="<?php esc_attr_e('YouTube video', 'the-black-door-oven'); ?>"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>