<?php
/**
 * Partners — UK / USA partner cards.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$partners_img = $uri . '/assets/images/partners';
$logo_uk = $partners_img . '/p1.webp';
$logo_usa = $partners_img . '/p2.webp';
$logo_fallback = $uri . '/assets/images/home/header-logo.webp';

if (!is_readable(get_template_directory() . '/assets/images/partners/p1.webp')) {
    $logo_uk = $logo_fallback;
}
if (!is_readable(get_template_directory() . '/assets/images/partners/p2.webp')) {
    $logo_usa = $logo_fallback;
}

$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR PARTNERS', 'heros-on-the-water'),
    'lead'     => __('Display your corporate sponsors, local businesses, charities, community organisations, and service providers who proudly support Heroes On The Water.', 'heros-on-the-water'),
    'partners' => array(
        array(
            'eyebrow' => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'title'   => __('HEROES ON THE WATER (UK)', 'heros-on-the-water'),
            'text'    => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'url'     => '#',
            'logo'    => $logo_uk,
            'alt'     => __('Heroes on the Water UK', 'heros-on-the-water'),
        ),
        array(
            'eyebrow' => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'title'   => __('HEROES ON THE WATER (USA)', 'heros-on-the-water'),
            'text'    => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'heros-on-the-water'),
            'url'     => '#',
            'logo'    => $logo_usa,
            'alt'     => __('Heroes on the Water USA', 'heros-on-the-water'),
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-partners" aria-labelledby="hotw-partners-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title hotw-partners__title" id="hotw-partners-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead hotw-partners__lead"><?php echo esc_html($args['lead']); ?></p>
        </header>

        <div class="hotw-partner-cards">
            <?php foreach ($args['partners'] as $partner) : ?>
                <article class="hotw-partner-card">
                    <div class="hotw-partner-card__media">
                        <img
                            class="hotw-partner-card__logo"
                            src="<?php echo esc_url($partner['logo']); ?>"
                            alt="<?php echo esc_attr(isset($partner['alt']) ? $partner['alt'] : ''); ?>"
                            width="354"
                            height="330"
                            loading="lazy"
                        >
                    </div>
                    <div class="hotw-partner-card__body">
                        <p class="hotw-partner-card__eyebrow"><?php echo esc_html($partner['eyebrow']); ?></p>
                        <h3 class="hotw-partner-card__title"><?php echo esc_html($partner['title']); ?></h3>
                        <p class="hotw-partner-card__text"><?php echo esc_html($partner['text']); ?></p>
                        <a class="hotw-btn hotw-btn--yellow hotw-btn--sm hotw-partner-card__cta" href="<?php echo esc_url($partner['url']); ?>">
                            <?php esc_html_e('CLICK HERE TO FIND OUT MORE', 'heros-on-the-water'); ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
