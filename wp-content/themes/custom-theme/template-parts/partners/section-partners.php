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
$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR PARTNERS', 'heros-on-the-water'),
    'lead'     => __('Display your corporate sponsors, local businesses, charities, community organizations, and service providers who proudly support Heroes On The Water.', 'heros-on-the-water'),
    'partners' => array(
        array(
            'eyebrow' => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'title'   => __('HEROES ON THE WATER (UK)', 'heros-on-the-water'),
            'text'    => __('Our UK network connects chapters and supporters dedicated to healing veterans through kayaking and outdoor adventure.', 'heros-on-the-water'),
            'url'     => '#',
            'logo'    => $uri . '/assets/images/header-logo.png',
        ),
        array(
            'eyebrow' => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'title'   => __('HEROES ON THE WATER (USA)', 'heros-on-the-water'),
            'text'    => __('The founding organisation inspiring chapters worldwide to paddle, fish, and heal with veterans and families.', 'heros-on-the-water'),
            'url'     => '#',
            'logo'    => $uri . '/assets/images/footer-logo.png',
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--white" aria-labelledby="hotw-partners-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-partners-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead"><?php echo esc_html($args['lead']); ?></p>
        </header>
        <div class="hotw-partner-cards">
            <?php foreach ($args['partners'] as $partner) : ?>
                <article class="hotw-partner-card">
                    <img class="hotw-partner-card__logo" src="<?php echo esc_url($partner['logo']); ?>" alt="" width="120" height="120" loading="lazy">
                    <div>
                        <p class="hotw-partner-card__eyebrow"><?php echo esc_html($partner['eyebrow']); ?></p>
                        <h3 class="hotw-partner-card__title"><?php echo esc_html($partner['title']); ?></h3>
                        <p class="hotw-partner-card__text"><?php echo esc_html($partner['text']); ?></p>
                        <a class="hotw-btn hotw-btn--yellow hotw-btn--sm" href="<?php echo esc_url($partner['url']); ?>"><?php esc_html_e('Click Here to Find Out More', 'heros-on-the-water'); ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
