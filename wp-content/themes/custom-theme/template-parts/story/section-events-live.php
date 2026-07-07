<?php
/**
 * Story: live events — asymmetric grid + bottom two-column row.
 *
 * Configurable via get_template_part() third argument ($args).
 * Optional wrapper: array( 'events_live_defaults' => $your_array ).
 *
 * @package Heros_On_The_Water
 *
 * @example Default (story / same as built-in defaults):
 *   get_template_part( 'template-parts/story/section', 'events-live' );
 *
 * @example Overrides (flat keys):
 *   get_template_part( 'template-parts/story/section', 'events-live', $events_args );
 *
 * @example Wrapped key:
 *   get_template_part( 'template-parts/story/section', 'events-live', array( 'events_live_defaults' => $events_args ) );
 */

if (!defined('ABSPATH')) {
    exit;
}

$events_live_default_args = array(
    'section_id' => 'story-events',
    'section_class' => 'hotw-section position-relative overflow-hidden',
    'images_base' => get_template_directory_uri() . '/assets/images/',
    'background_image' => 'event-bg.png',
    'card_bg_featured' => 'left.png',
    'card_bg_stacked' => 'right.png',
    'ribbon_image' => 'ribbon.png',
    'eyebrow' => __('Live music events', 'heros-on-the-water'),
    'title' => __("What's on at", 'heros-on-the-water'),
    'venue_name' => __('Heroes on the Water', 'heros-on-the-water'),
    'featured' => array(
        'title' => __('Acoustic Sessions', 'heros-on-the-water'),
        'date' => __('24 Aug', 'heros-on-the-water'),
        'time' => __('Sat · 7:00 PM – 10:00 PM', 'heros-on-the-water'),
        'excerpt' => __('Local songwriters and stripped-back sets on the terrace — bring a blanket and your favourite slice.', 'heros-on-the-water'),
        'seed' => 'event-1.png',
        'more_url' => home_url('/'),
        'more_label' => __('More info', 'heros-on-the-water'),
    ),
    'stacked' => array(
        array(
            'title' => __('Jazz & Bubbles', 'heros-on-the-water'),
            'date' => __('12 Sep', 'heros-on-the-water'),
            'time' => __('Fri · 6:30 PM – 9:00 PM', 'heros-on-the-water'),
            'excerpt' => __('Brass, bass, and wood-fired aromas under string lights.', 'heros-on-the-water'),
            'seed' => 'event-2.png',
        ),
        array(
            'title' => __('Family Pizza & Vinyl', 'heros-on-the-water'),
            'date' => __('03 Oct', 'heros-on-the-water'),
            'time' => __('Sun · 4:00 PM – 7:00 PM', 'heros-on-the-water'),
            'excerpt' => __('All-ages afternoon: classic pies and crate-digging on the deck.', 'heros-on-the-water'),
            'seed' => 'event-3.png',
        ),
    ),
    'footer_paragraph' => __('Follow Heroes on the Water on social media for event updates, volunteer opportunities, and community stories.', 'heros-on-the-water'),
    'cta_label' => __('View more events', 'heros-on-the-water'),
    'cta_url' => home_url('/'),
);

$template_args = (isset($args) && is_array($args)) ? $args : array();
$passed = array();
if (!empty($template_args['events_live_defaults']) && is_array($template_args['events_live_defaults'])) {
    $passed = $template_args['events_live_defaults'];
} else {
    $passed = $template_args;
    unset($passed['events_live_defaults']);
}

$events_live = wp_parse_args($passed, $events_live_default_args);
$events_live['featured'] = wp_parse_args(
    isset($passed['featured']) && is_array($passed['featured']) ? $passed['featured'] : array(),
    $events_live_default_args['featured']
);

$images_base = trim((string) $events_live['images_base']);
if ($images_base === '' || strncmp($images_base, 'Array', 5) === 0) {
    $events_live['images_base'] = $events_live_default_args['images_base'];
}

if (!is_array($events_live['stacked'])) {
    $events_live['stacked'] = $events_live_default_args['stacked'];
}

$img_base = trailingslashit((string) $events_live['images_base']);
$ev_asset_url = static function ($file) use ($img_base) {
    return $img_base . ltrim((string) $file, '/');
};

$featured = $events_live['featured'];
if (!isset($featured['seed']) || $featured['seed'] === '') {
    $featured['seed'] = $events_live_default_args['featured']['seed'];
}
$featured_more_url = isset($featured['more_url']) && $featured['more_url'] !== ''
    ? $featured['more_url']
    : $events_live_default_args['featured']['more_url'];
$featured_more_label = isset($featured['more_label']) && $featured['more_label'] !== ''
    ? $featured['more_label']
    : $events_live_default_args['featured']['more_label'];

?>
<section class="<?php echo esc_attr($events_live['section_class']); ?>"
    id="<?php echo esc_attr($events_live['section_id']); ?>"
    style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['background_image'])); ?>');">
    <div class="container position-relative">
        <header class="hotw-story-head hotw-story-head--live text-center mb-4 mb-lg-5">
            <p class="hotw-kicker hotw-story-live__eyebrow"><?php echo esc_html($events_live['eyebrow']); ?></p>
            <h2 class="hotw-title hotw-story-live__title mb-0">
                <?php echo esc_html($events_live['title']); ?> <strong>Heroes on the Water</strong>
            </h2>
            <!-- <span class="hotw-story-live__name"><?php echo esc_html($events_live['venue_name']); ?></span> -->
        </header>

        <div class="row g-4 g-lg-4 mb-4 mb-lg-5 align-items-stretch event-row">
            <div class="col-lg-5">
                <article class="hotw-story-event-card hotw-story-event-card--featured h-100"
                    style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['card_bg_featured'])); ?>');">
                    <div class="hotw-story-event-card__media hotw-story-event-card__media--featured">
                        <div class="hotw-story-event-card__circle">
                            <img src="<?php echo esc_url_raw($ev_asset_url($featured['seed'])); ?>" alt="" width="720" height="720"
                                loading="lazy" decoding="async">
                        </div>
                    </div>
                    <div class="hotw-story-event-card__ribbon" aria-hidden="true"
                        style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['ribbon_image'])); ?>');">
                        <span><?php echo esc_html($featured['date']); ?></span>
                    </div>
                    <div class="hotw-story-event-card__body">
                        <h3 class="hotw-story-event-card__title"><?php echo esc_html($featured['title']); ?></h3>
                        <p class="hotw-story-event-card__time">
                            <span class="hotw-story-event-card__time-icon" aria-hidden="true"></span>
                            <span><?php echo esc_html($featured['time']); ?></span>
                        </p>
                        <p class="hotw-story-event-card__excerpt"><?php echo esc_html($featured['excerpt']); ?></p>
                        <a class="blob-button hotw-story-event-card__btn"
                            href="<?php echo esc_url($featured_more_url); ?>"><?php echo esc_html($featured_more_label); ?></a>
                    </div>
                </article>
            </div>
            <div class="col-lg-7">
                <div class="d-flex flex-column gap-4 h-100 event-right">
                    <?php foreach ($events_live['stacked'] as $event) : ?>
                        <?php
                        if (!is_array($event)) {
                            continue;
                        }
                        $event = wp_parse_args($event, $events_live_default_args['featured']);
                        if (!isset($event['seed']) || $event['seed'] === '') {
                            $event['seed'] = $events_live_default_args['featured']['seed'];
                        }
                        $stack_more_url = isset($event['more_url']) && $event['more_url'] !== ''
                            ? $event['more_url']
                            : $events_live_default_args['featured']['more_url'];
                        $stack_more_label = isset($event['more_label']) && $event['more_label'] !== ''
                            ? $event['more_label']
                            : $events_live_default_args['featured']['more_label'];
                        ?>
                    <article class="hotw-story-event-card hotw-story-event-card--compact flex-grow-1"
                        style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['card_bg_stacked'])); ?>');">
                        <div class="hotw-story-event-card__ribbon" aria-hidden="true"
                            style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['ribbon_image'])); ?>');">
                            <span><?php echo esc_html($event['date']); ?></span>
                        </div>
                        <div class="hotw-story-event-card__compact-inner">
                            <div class="hotw-story-event-card__media hotw-story-event-card__media--sm">
                                <div class="hotw-story-event-card__circle">
                                    <img src="<?php echo esc_url_raw($ev_asset_url($event['seed'])); ?>" alt="" width="400"
                                        height="400" loading="lazy" decoding="async">
                                </div>
                            </div>
                            <div class="hotw-story-event-card__body">
                                <h3 class="hotw-story-event-card__title"><?php echo esc_html($event['title']); ?></h3>
                                <p class="hotw-story-event-card__time">
                                    <span class="hotw-story-event-card__time-icon" aria-hidden="true"></span>
                                    <span><?php echo esc_html($event['time']); ?></span>
                                </p>
                                <p class="hotw-story-event-card__excerpt"><?php echo esc_html($event['excerpt']); ?></p>
                                <a class="blob-button hotw-story-event-card__btn"
                                    href="<?php echo esc_url($stack_more_url); ?>"><?php echo esc_html($stack_more_label); ?></a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="hotw-prose text-center mx-auto mt-4 mt-lg-5 hotw-story-live__footer-copy">
            <p><?php echo esc_html($events_live['footer_paragraph']); ?></p>
        </div>
        <div class="text-center mt-3">
            <a class="blob-button hotw-story-cta-red"
                href="<?php echo esc_url($events_live['cta_url']); ?>"><?php echo esc_html($events_live['cta_label']); ?></a>
        </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const ribbons = document.querySelectorAll(".hotw-story-event-card__ribbon span");

    ribbons.forEach((el) => {
        const text = el.textContent.trim();

        if (!text) return;

        const words = text.split(" ");
        const firstWord = words.shift();

        el.innerHTML = `<span>${firstWord}</span> ${words.join(" ")}`;
    });
});
</script>
