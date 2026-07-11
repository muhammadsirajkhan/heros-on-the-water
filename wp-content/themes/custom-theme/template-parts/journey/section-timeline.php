<?php
/**
 * Journey timeline carousel.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'    => __('HEROES ON THE WATER - TIMELINE', 'heros-on-the-water'),
    'title'    => __('HEALING THROUGH NATURE', 'heros-on-the-water'),
    'lead'     => __('Thank you to everyone involved in the building of our base', 'heros-on-the-water'),
    'steps'    => array(
        __('The Beginning', 'heros-on-the-water'),
        __('The Clean-Up', 'heros-on-the-water'),
        __('Main Structure', 'heros-on-the-water'),
    ),
    'cards'    => array(
        array(
            'label' => __('Timeline 01', 'heros-on-the-water'),
            'title' => __('THE BEGINNING', 'heros-on-the-water'),
            'text'  => __('The vision for a veteran-focused outdoor base on the Isle of Man took shape with community support and determination.', 'heros-on-the-water'),
            'img'   => $uri . '/assets/images/g2.png',
        ),
        array(
            'label' => __('Timeline 02', 'heros-on-the-water'),
            'title' => __('THE CLEAN-UP', 'heros-on-the-water'),
            'text'  => __('Volunteers cleared and prepared the site, transforming unused ground into a place of welcome and healing.', 'heros-on-the-water'),
            'img'   => $uri . '/assets/images/g3.png',
        ),
        array(
            'label' => __('Timeline 03', 'heros-on-the-water'),
            'title' => __('MAIN STRUCTURE', 'heros-on-the-water'),
            'text'  => __('The base rose with Relax, Fish, and Heal at its heart — a home for programs that serve veterans every week.', 'heros-on-the-water'),
            'img'   => $uri . '/assets/images/g4.png',
        ),
        array(
            'label' => __('Timeline 04', 'heros-on-the-water'),
            'title' => __('OPENING DAYS', 'heros-on-the-water'),
            'text'  => __('Programs launched and visitors arrived — paddle, fish, and heal became a lived experience for the community.', 'heros-on-the-water'),
            'img'   => $uri . '/assets/images/g5.png',
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray hotw-journey-timeline" id="content-start" aria-labelledby="hotw-journey-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-journey-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead"><?php echo esc_html($args['lead']); ?></p>
        </header>

        <div class="hotw-timeline-steps" aria-hidden="true">
            <?php foreach ($args['steps'] as $step) : ?>
                <div class="hotw-timeline-step">
                    <div class="hotw-timeline-step__dot"></div>
                    <div class="hotw-timeline-step__label"><?php echo esc_html($step); ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="swiper hotw-timeline-swiper-root">
            <div class="swiper-wrapper">
                <?php foreach ($args['cards'] as $card) : ?>
                    <div class="swiper-slide">
                        <article class="hotw-timeline-card">
                            <div class="hotw-timeline-card__media">
                                <img class="hotw-timeline-card__img" src="<?php echo esc_url($card['img']); ?>" alt="" width="640" height="400" loading="lazy">
                                <button type="button" class="hotw-timeline-card__play" aria-label="<?php esc_attr_e('Play timeline video', 'heros-on-the-water'); ?>">▶</button>
                            </div>
                            <div class="hotw-timeline-card__body">
                                <span class="hotw-timeline-card__label"><?php echo esc_html($card['label']); ?></span>
                                <h3 class="hotw-timeline-card__title"><?php echo esc_html($card['title']); ?></h3>
                                <p class="hotw-timeline-card__text"><?php echo esc_html($card['text']); ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="hotw-timeline-nav">
            <button type="button" class="hotw-timeline-nav__btn hotw-timeline-nav__btn--prev" aria-label="<?php esc_attr_e('Previous', 'heros-on-the-water'); ?>">←</button>
            <button type="button" class="hotw-timeline-nav__btn hotw-timeline-nav__btn--next" aria-label="<?php esc_attr_e('Next', 'heros-on-the-water'); ?>">→</button>
        </div>
    </div>
</section>
