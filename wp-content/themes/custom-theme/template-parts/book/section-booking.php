<?php
/**
 * Contact page: intro, details grid, social, map, CF7 form card.
 *
 * Pass `cf7_shortcode` from contact-page.php (from WP: Contact → Contact Forms → copy shortcode).
 * Optional wrapper: array( 'contact_defaults' => array(...) ).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$t_uri = get_template_directory_uri();

$booking_default_args = array(
    'cf7_shortcode' => '[contact-form-7 id="de1ffe0" title="Book Form" html_class="hotw-cf7"]',
);

$passed = array();
if (isset($args) && is_array($args)) {
    $passed = $args;
}
$booking = wp_parse_args($passed, $booking_default_args);
$cf7_shortcode = ! empty($booking['cf7_shortcode'])
    ? (string) $booking['cf7_shortcode']
    : $booking_default_args['cf7_shortcode'];

?>
<section class="hotw-section hotw-book-table" id="book-table" aria-labelledby="">
    <div class="bg-img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/bg1.png" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/bg2.png" alt="">
    </div>
    <div class="container py-lg-2">


        <header class="text-center mb-5">
            <p class="hotw-kicker">CLASSIC PIZZAS</p>
            <h2 class="hotw-title">Reserve Your <strong>Table Today</strong>
            </h2>
        </header>

        <div class="row justify-content-between g-4 g-lg-5 align-items-start">
            <div class="col-lg-12 col-12">
                <div class="hotw-contact-form-card"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/form-bg.png');">

                    <div class="hotw-contact-form-card__inner">
                        <p>Join us for wood-fired pizza, live music, and a relaxed, welcoming atmosphere.Book your table
                            in advance and enjoy great food, great music, and great company — all in one place.</p>
                        <div class="hotw-contact-form-card__cf7">
                            <?php echo do_shortcode($cf7_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CF7 shortcode. ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row book-tiles">
            <div class="col-lg-3 col-12">
                <div class="tiles"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/22.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/1.png" alt="">
                    <span>
                        Please Arrive On Time For
                        Your Reservation
                    </span>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="tiles"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/22.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/2.png" alt="">
                    <span>
                        Let us know if you’re
                        running late
                    </span>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="tiles"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/22.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/3.png" alt="">
                    <span>
                        Walk-ins are welcome, but
                        booking is recommended
                    </span>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="tiles"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/22.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book/4.png" alt="">
                    <span>
                        For larger groups, please
                        contact us directly
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hotw-section hotw-more"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/33.png');">
    <div class="container">
        <div class="row align-items-center justify-content-around g-4 g-lg-5">
            <div class="col-lg-4 col-md-6">
                <p class="hotw-kicker">Good food great vibes</p>
                <h2 class="hotw-title">More Than
                    Just <strong>Dining</strong>
                </h2>
                <div class="hotw-prose mt-4 mb-4">
                    <p>At Heroes on the Water, it’s not just about the food — it’s about the experience.</p>

                    <p>Enjoy live music, a cozy atmosphere, and freshly made pizza straight from our wood-fired oven.
                    </p>

                    <p>Whether you're here for a quick bite or a full evening, there’s always something to enjoy.</p>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="hotw-vibe-media">
                    <div class="hotw-vibe-media__main">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/book/5.png'); ?>"
                            alt="" class="img-fluid" loading="lazy">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class=" visit-us">
    <div class="container">
        <div class="visit-wrap bg-class"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/book/map-bg.png');">
            <div class="row">
                <header class="text-center mb-5">
                    <h2 class="hotw-title">Find Us And <strong>Visit</strong>
                    </h2>
                </header>
                <div class="hotw-prose hotw-prose--cream">
                    <p>We’re located in a welcoming spot, perfect for
                        relaxed evenings and lively nights.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="map">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/book/right-book.png'); ?>"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="visit">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/book/left-book.png'); ?>"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>