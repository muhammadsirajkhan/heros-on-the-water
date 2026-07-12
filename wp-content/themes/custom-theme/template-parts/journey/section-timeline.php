<?php
/**
 * Journey timeline carousel — Healing Through Nature.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$img = $uri . '/assets/images/our-journey';
$play_icon = $img . '/youtube-icon.webp';
$dummy_youtube = 'K4TOrB7at0Y';
$modal_id = 'hotwJourneyYoutubeModal';

$defaults = array(
    'badge' => __('HEROES ON THE WATER - TIMELINE', 'heros-on-the-water'),
    'title' => __('HEALING THROUGH NATURE', 'heros-on-the-water'),
    'lead'  => __('Thank you to everyone involved in the building of our base', 'heros-on-the-water'),
    'cards' => array(
        array(
            'step'       => __('The Beginning', 'heros-on-the-water'),
            'label'      => __('Timeline 01', 'heros-on-the-water'),
            'title'      => __('THE BEGINNING', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/1.webp',
            'alt'        => __('The beginning of the Heroes on the Water base', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
        array(
            'step'       => __('The Clean-Up', 'heros-on-the-water'),
            'label'      => __('Timeline 02', 'heros-on-the-water'),
            'title'      => __('THE CLEAN-UP', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/2.webp',
            'alt'        => __('Volunteers cleaning the Port Soderick site', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
        array(
            'step'       => __('Main Structure', 'heros-on-the-water'),
            'label'      => __('Timeline 03', 'heros-on-the-water'),
            'title'      => __('MAIN STRUCTURE', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/3.webp',
            'alt'        => __('Main structure of the Heroes on the Water base', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
        array(
            'step'       => __('The Beginning', 'heros-on-the-water'),
            'label'      => __('Timeline 01', 'heros-on-the-water'),
            'title'      => __('THE BEGINNING', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/1.webp',
            'alt'        => __('The beginning of the Heroes on the Water base', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
        array(
            'step'       => __('The Clean-Up', 'heros-on-the-water'),
            'label'      => __('Timeline 02', 'heros-on-the-water'),
            'title'      => __('THE CLEAN-UP', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/2.webp',
            'alt'        => __('Volunteers cleaning the Port Soderick site', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
        array(
            'step'       => __('Main Structure', 'heros-on-the-water'),
            'label'      => __('Timeline 03', 'heros-on-the-water'),
            'title'      => __('MAIN STRUCTURE', 'heros-on-the-water'),
            'text'       => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'img'        => $img . '/3.webp',
            'alt'        => __('Main structure of the Heroes on the Water base', 'heros-on-the-water'),
            'youtube_id' => $dummy_youtube,
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray hotw-journey-timeline" id="content-start" aria-labelledby="hotw-journey-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title hotw-journey-timeline__title" id="hotw-journey-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead hotw-journey-timeline__lead"><?php echo esc_html($args['lead']); ?></p>
        </header>

        <div class="hotw-timeline">
            <button type="button" class="hotw-timeline-nav__btn hotw-timeline-nav__btn--prev" aria-label="<?php esc_attr_e('Previous timeline slide', 'heros-on-the-water'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>

            <div class="swiper hotw-timeline-swiper-root">
                <div class="swiper-wrapper">
                    <?php foreach ($args['cards'] as $card) : ?>
                        <?php
                        $youtube_id = isset($card['youtube_id']) && $card['youtube_id'] !== '' ? $card['youtube_id'] : $dummy_youtube;
                        $play_label = sprintf(
                            /* translators: %s: timeline card title */
                            __('Play video: %s', 'heros-on-the-water'),
                            $card['title']
                        );
                        ?>
                        <div class="swiper-slide">
                            <article class="hotw-timeline-card">
                                <div class="hotw-timeline-card__step">
                                    <span class="hotw-timeline-card__step-label"><?php echo esc_html($card['step']); ?></span>
                                    <span class="hotw-timeline-card__dot" aria-hidden="true"></span>
                                    <span class="hotw-timeline-card__stem" aria-hidden="true"></span>
                                </div>
                                <button
                                    type="button"
                                    class="hotw-timeline-card__media"
                                    data-bs-toggle="modal"
                                    data-bs-target="#<?php echo esc_attr($modal_id); ?>"
                                    data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
                                    aria-label="<?php echo esc_attr($play_label); ?>"
                                >
                                    <img
                                        class="hotw-timeline-card__img"
                                        src="<?php echo esc_url($card['img']); ?>"
                                        alt="<?php echo esc_attr(isset($card['alt']) ? $card['alt'] : ''); ?>"
                                        width="640"
                                        height="400"
                                        loading="lazy"
                                    >
                                    <span class="hotw-timeline-card__play" aria-hidden="true">
                                        <img src="<?php echo esc_url($play_icon); ?>" alt="" width="64" height="44" loading="lazy">
                                    </span>
                                </button>
                                <div class="hotw-timeline-card__body">
                                    <span class="hotw-timeline-card__label"><?php echo esc_html($card['label']); ?></span>
                                    <h3 class="hotw-timeline-card__title"><?php echo esc_html($card['title']); ?></h3>
                                    <p class="hotw-timeline-card__text"><?php echo esc_html($card['text']); ?></p>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="button" class="hotw-timeline-nav__btn hotw-timeline-nav__btn--next" aria-label="<?php esc_attr_e('Next timeline slide', 'heros-on-the-water'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </div>
    </div>
</section>

<div
    class="modal fade hotw-youtube-modal"
    id="<?php echo esc_attr($modal_id); ?>"
    tabindex="-1"
    aria-hidden="true"
    data-youtube-id="<?php echo esc_attr($dummy_youtube); ?>"
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
                        title="<?php esc_attr_e('Heroes on the Water timeline video', 'heros-on-the-water'); ?>"
                        src=""
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
