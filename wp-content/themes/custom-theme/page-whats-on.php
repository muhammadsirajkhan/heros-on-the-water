<?php
/**
 * What's On — dual month calendar + upcoming events.
 *
 * Template Name: What's On
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$tz = wp_timezone();
$month1 = new DateTimeImmutable('first day of this month', $tz);
$month2 = $month1->modify('+1 month');

$range_start = $month1->format('Ymd');
$range_end = $month2->modify('last day of this month')->format('Ymd');

$range_posts = hotw_whats_on_get_events_for_range($range_start, $range_end);
$day_map = hotw_whats_on_build_day_map($range_posts);

$upcoming_posts = hotw_whats_on_get_upcoming_events();

?>

<main id="primary" class="site-main hotw-main hotw-whats-on">

    <?php
    while (have_posts()):
        the_post();
        ?>
        <div class="container hotw-whats-on__page-title pt-4 pt-lg-5">
            <h1 class="hotw-title text-center mb-0"><?php the_title(); ?></h1>
        </div>
        <?php
    endwhile;
    rewind_posts();
    ?>

    <div class="container hotw-whats-on__view-wrap">
        <div class="hotw-whats-on-toggle" role="tablist"
            aria-label="<?php esc_attr_e('What\'s On view', 'heros-on-the-water'); ?>">
            <button type="button" class="hotw-whats-on-toggle__btn" role="tab" id="hotw-whats-on-tab-upcoming"
                aria-controls="whats-on-panel-upcoming" aria-selected="false">
                <?php esc_html_e('Upcoming events', 'heros-on-the-water'); ?>
            </button>
            <button type="button" class="hotw-whats-on-toggle__btn hotw-whats-on-toggle__btn--is-active" role="tab"
                id="hotw-whats-on-tab-calendar" aria-controls="whats-on-panel-calendar" aria-selected="true">
                <?php esc_html_e('Calendar view', 'heros-on-the-water'); ?>
            </button>
        </div>
    </div>

    <div id="whats-on-panel-calendar" class="hotw-whats-on-panel" role="tabpanel"
        aria-labelledby="hotw-whats-on-tab-calendar">
        <?php
        /*
         * Use require here, not load_template( ..., $args ): core load_template() does not
         * extract $args into the partial's scope, so $months / $day_map / $upcoming_posts
         * would never reach those files and lists would always appear empty.
         */
        $months = array($month1, $month2);
        require get_template_directory() . '/template-parts/whats-on/section-calendar.php';
        ?>
    </div>

    <div id="whats-on-panel-upcoming" class="hotw-whats-on-panel" role="tabpanel"
        aria-labelledby="hotw-whats-on-tab-upcoming" hidden>
        <?php
        require get_template_directory() . '/template-parts/whats-on/section-upcoming.php';
        ?>
    </div>
</main>

    <?php
    get_footer();
