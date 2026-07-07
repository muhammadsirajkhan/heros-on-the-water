<?php
/**
 * Story: live events — asymmetric grid + bottom two-column row.
 *
 * Configurable via get_template_part() third argument ($args).
 * Optional wrapper: array( 'events_live_defaults' => $your_array ).
 *
 * @package The_Black_Door_Oven
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
    'section_class' => 'oven-section position-relative overflow-hidden',
    'images_base' => get_template_directory_uri() . '/assets/images/',
    'background_image' => 'event-bg.png',
    'card_bg_featured' => 'left.png',
    'card_bg_stacked' => 'right.png',
    'ribbon_image' => 'ribbon.png',
    'eyebrow' => __('Live music events', 'the-black-door-oven'),
    'title' => __("What's on at", 'the-black-door-oven'),
    'venue_name' => __('Black Dog Oven', 'the-black-door-oven'),
    'featured' => array(
        'title' => __('Wheat-free bases', 'the-black-door-oven'),
        'date' => __('24 Aug', 'the-black-door-oven'),
        'time' => __('+£1.50', 'the-black-door-oven'),
        'excerpt' => __('Own recipe. Not always round but always delicious.', 'the-black-door-oven'),
        'seed' => 'sig-1.png',
        'more_url' => home_url('/'),
        'more_label' => __('More info', 'the-black-door-oven'),
    ),
    'stacked' => array(
        array(
            'title' => __('Extra Meat or Cheese', 'the-black-door-oven'),
            'date' => __('12 Sep', 'the-black-door-oven'),
            'time' => __('+£1.50', 'the-black-door-oven'),
            'excerpt' => __('Enjoy an evening of live music from talented local artists while you relax with freshly made wood-fired pizza.
 and drinks.
', 'the-black-door-oven'),
            'seed' => 'sig-2.png',
        ),
        array(
            'title' => __('Chilli or garlic mayo dip', 'the-black-door-oven'),
            'date' => __('03 Oct', 'the-black-door-oven'),
            'time' => __('+£1.50', 'the-black-door-oven'),
            'excerpt' => __('Enjoy an evening of live music from talented local artists while you relax with freshly made wood-fired pizza.
 and drinks.', 'the-black-door-oven'),
            'seed' => 'sig-3.png',
        ),
    ),
    'footer_paragraph' => __('Follow the oven on socials for line-up drops, ticket links, and one-off collaborations with island artists.', 'the-black-door-oven'),
    'cta_label' => __('View more events', 'the-black-door-oven'),
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
        <header class="oven-story-head oven-story-head--live text-center mb-4 mb-lg-5">
            <p class="oven-story-live__eyebrow"><?php echo esc_html($events_live['eyebrow']); ?></p>
            <h2 class="oven-title oven-story-live__title mb-0">
                <?php echo esc_html($events_live['title']); ?>
            </h2>
            <span class="oven-story-live__name"><?php echo esc_html($events_live['venue_name']); ?></span>
        </header>

        <div class="row g-4 g-lg-4 mb-4 mb-lg-5 align-items-stretch event-row">
            <div class="col-lg-5">
                <article class="oven-story-event-card oven-story-event-card--featured h-100 extras-live-card"
                    style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['card_bg_featured'])); ?>');">
                    <div class="oven-story-event-card__media oven-story-event-card__media--featured">
                        <div class="oven-story-event-card__circle">
                            <img src="<?php echo esc_url_raw($ev_asset_url($featured['seed'])); ?>" alt="" width="720"
                                height="720" loading="lazy" decoding="async">
                        </div>
                    </div>
                    <!-- <div class="oven-story-event-card__ribbon" aria-hidden="true"
                        style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['ribbon_image'])); ?>');">
                        <span><?php echo esc_html($featured['date']); ?></span>
                    </div> -->
                    <div class="oven-story-event-card__body">
                        <h3 class="oven-story-event-card__title"><?php echo esc_html($featured['title']); ?></h3>
                        <p class="oven-story-event-card__excerpt"><?php echo esc_html($featured['excerpt']); ?></p>
                        <p class="oven-story-event-card__time">
                        
                            <span><?php echo esc_html($featured['time']); ?></span>
                        </p>
                        <a class="blob-button oven-story-event-card__btn"
                            href="<?php echo esc_url($featured_more_url); ?>"><?php echo esc_html($featured_more_label); ?></a>
                    </div>
                </article>
            </div>
            <div class="col-lg-7">
                <div class="d-flex flex-column gap-4 h-100 event-right">
                    <?php foreach ($events_live['stacked'] as $event): ?>
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
                        <article class="oven-story-event-card oven-story-event-card--compact flex-grow-1 extras-live-card"
                            style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['card_bg_stacked'])); ?>');">
                            <!-- <div class="oven-story-event-card__ribbon" aria-hidden="true"
                                style="background-image: url('<?php echo esc_url_raw($ev_asset_url($events_live['ribbon_image'])); ?>');">
                                <span><?php echo esc_html($event['date']); ?></span>
                            </div> -->
                            <div class="oven-story-event-card__compact-inner">
                                <div class="oven-story-event-card__media oven-story-event-card__media--sm">
                                    <div class="oven-story-event-card__circle">
                                        <img src="<?php echo esc_url_raw($ev_asset_url($event['seed'])); ?>" alt=""
                                            width="400" height="400" loading="lazy" decoding="async">
                                    </div>
                                </div>
                                <div class="oven-story-event-card__body">
                                    <h3 class="oven-story-event-card__title"><?php echo esc_html($event['title']); ?></h3>
                                    <p class="oven-story-event-card__excerpt"><?php echo esc_html($event['excerpt']); ?></p>
                                    <div class="oven-story_button-wrap">
                                        <p class="oven-story-event-card__time">
                                        
                                            <span><?php echo esc_html($event['time']); ?></span>
                                        </p>
                                        <a class="blob-button oven-story-event-card__btn"
                                            href="<?php echo esc_url($stack_more_url); ?>"><?php echo esc_html($stack_more_label); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

       
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ribbons = document.querySelectorAll(".oven-story-event-card__ribbon span");

        ribbons.forEach((el) => {
            const text = el.textContent.trim();

            if (!text) return;

            const words = text.split(" ");
            const firstWord = words.shift();

            el.innerHTML = `<span>${firstWord}</span> ${words.join(" ")}`;
        });
    });
</script>