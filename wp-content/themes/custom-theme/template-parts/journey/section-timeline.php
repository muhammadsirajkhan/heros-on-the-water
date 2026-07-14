<?php
/**
 * Journey timeline carousel — Healing Through Nature.
 *
 * ACF group: journey_timeline (see acf-json/group_hotw_journey.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$timeline = function_exists('get_field') ? get_field('journey_timeline') : null;
if (!is_array($timeline)) {
    $timeline = array();
}

$badge = isset($timeline['badge']) ? (string) $timeline['badge'] : '';
$title = isset($timeline['title']) ? (string) $timeline['title'] : '';
$lead  = isset($timeline['lead']) ? (string) $timeline['lead'] : '';
$cards = (!empty($timeline['cards']) && is_array($timeline['cards'])) ? $timeline['cards'] : array();

$play_icon = get_template_directory_uri() . '/assets/images/our-journey/youtube-icon.webp';
$modal_id  = 'hotwJourneyYoutubeModal';

$first_youtube = '';
foreach ($cards as $card_check) {
    if (is_array($card_check) && !empty($card_check['youtube_id'])) {
        $first_youtube = (string) $card_check['youtube_id'];
        break;
    }
}
?>
<section class="hotw-block hotw-journey-timeline" id="content-start" aria-labelledby="hotw-journey-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title hotw-journey-timeline__title" id="hotw-journey-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($lead !== '') : ?>
                <p class="hotw-section-lead hotw-journey-timeline__lead"><?php echo esc_html($lead); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($cards) : ?>
            <div class="hotw-timeline">
                <button type="button" class="hotw-timeline-nav__btn hotw-timeline-nav__btn--prev" aria-label="<?php esc_attr_e('Previous timeline slide', 'heros-on-the-water'); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <div class="swiper hotw-timeline-swiper-root">
                    <div class="swiper-wrapper">
                        <?php foreach ($cards as $card) : ?>
                            <?php
                            if (!is_array($card)) {
                                continue;
                            }
                            $step       = isset($card['step']) ? (string) $card['step'] : '';
                            $label      = isset($card['label']) ? (string) $card['label'] : '';
                            $card_title = isset($card['title']) ? (string) $card['title'] : '';
                            $text       = isset($card['text']) ? (string) $card['text'] : '';
                            $youtube_id = isset($card['youtube_id']) ? trim((string) $card['youtube_id']) : '';
                            $image      = (isset($card['image']) && is_array($card['image'])) ? $card['image'] : null;
                            $img_url    = (!empty($image['url'])) ? $image['url'] : '';
                            $img_alt    = (!empty($image['alt'])) ? $image['alt'] : '';

                            if ($step === '' && $label === '' && $card_title === '' && $text === '' && $img_url === '') {
                                continue;
                            }

                            $play_label = sprintf(
                                /* translators: %s: timeline card title */
                                __('Play video: %s', 'heros-on-the-water'),
                                $card_title !== '' ? $card_title : __('timeline', 'heros-on-the-water')
                            );
                            ?>
                            <div class="swiper-slide">
                                <article class="hotw-timeline-card">
                                    <div class="hotw-timeline-card__step">
                                        <?php if ($step !== '') : ?>
                                            <span class="hotw-timeline-card__step-label"><?php echo esc_html($step); ?></span>
                                        <?php endif; ?>
                                        <span class="hotw-timeline-card__dot" aria-hidden="true"></span>
                                        <span class="hotw-timeline-card__stem" aria-hidden="true"></span>
                                    </div>
                                    <?php if ($img_url !== '') : ?>
                                        <?php if ($youtube_id !== '') : ?>
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
                                                    src="<?php echo esc_url($img_url); ?>"
                                                    alt="<?php echo esc_attr($img_alt); ?>"
                                                    width="640"
                                                    height="400"
                                                    loading="lazy"
                                                >
                                                <span class="hotw-timeline-card__play" aria-hidden="true">
                                                    <img src="<?php echo esc_url($play_icon); ?>" alt="" width="64" height="44" loading="lazy">
                                                </span>
                                            </button>
                                        <?php else : ?>
                                            <div class="hotw-timeline-card__media">
                                                <img
                                                    class="hotw-timeline-card__img"
                                                    src="<?php echo esc_url($img_url); ?>"
                                                    alt="<?php echo esc_attr($img_alt); ?>"
                                                    width="640"
                                                    height="400"
                                                    loading="lazy"
                                                >
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="hotw-timeline-card__body">
                                        <?php if ($label !== '') : ?>
                                            <span class="hotw-timeline-card__label"><?php echo esc_html($label); ?></span>
                                        <?php endif; ?>
                                        <?php if ($card_title !== '') : ?>
                                            <h3 class="hotw-timeline-card__title"><?php echo esc_html($card_title); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($text !== '') : ?>
                                            <p class="hotw-timeline-card__text"><?php echo esc_html($text); ?></p>
                                        <?php endif; ?>
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
        <?php endif; ?>
    </div>
</section>

<?php if ($first_youtube !== '') : ?>
    <div
        class="modal fade hotw-youtube-modal"
        id="<?php echo esc_attr($modal_id); ?>"
        tabindex="-1"
        aria-hidden="true"
        data-youtube-id="<?php echo esc_attr($first_youtube); ?>"
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
<?php endif; ?>
