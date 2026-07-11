<?php
/**
 * About Us — map, parking, keep bay green.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('ABOUT US', 'heros-on-the-water'),
    'subtitle' => __('MAP ★ PARKING ★ CLEAN GREEN', 'heros-on-the-water'),
    'items'    => array(
        array(
            'icon'  => $uri . '/assets/images/about/1.webp',
            'title' => __('MAP', 'heros-on-the-water'),
            'text'  => __('We are quite easy to find being less than 10 minutes drive from Douglas town centre, please see the map for directions.', 'heros-on-the-water'),
        ),
        array(
            'icon'  => $uri . '/assets/images/about/2.webp',
            'title' => __('PARKING', 'heros-on-the-water'),
            'text'  => __('Please park considerately, we share our carpark with the Glen. Please do not park at the entrance of the beach as this needs to be kept clear for access.', 'heros-on-the-water'),
        ),
        array(
            'icon'  => $uri . '/assets/images/about/3.webp',
            'title' => __('KEEP OUR BAY GREEN & CLEAN', 'heros-on-the-water'),
            'text'  => __('Please help us to ensure Port Soderick is kept in its beautiful state by placing all litter in the bins provided. We are proud proud of the bay and hope you will be too.', 'heros-on-the-water'),
        ),
    ),
    'map_embed' => 'https://maps.google.com/maps?q=Port%20Soderick%20Isle%20of%20Man&t=&z=14&ie=UTF8&iwloc=&output=embed',
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-about-info" id="content-start" aria-labelledby="hotw-about-info-title">
    <div class="container">
        <div class="hotw-about-info__grid">
            <div class="hotw-about-info__copy">
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
                <h2 class="hotw-section-title hotw-about-info__title" id="hotw-about-info-title"><?php echo esc_html($args['title']); ?></h2>
                <p class="hotw-section-subtitle hotw-about-info__subtitle"><?php echo esc_html($args['subtitle']); ?></p>

                <div class="hotw-about-info__list">
                    <?php foreach ($args['items'] as $item) : ?>
                        <div class="hotw-about-info__item">
                            <div class="hotw-about-info__icon-wrap" aria-hidden="true">
                                <img
                                    class="hotw-about-info__icon"
                                    src="<?php echo esc_url($item['icon']); ?>"
                                    alt=""
                                    width="62"
                                    height="83"
                                    loading="lazy"
                                >
                            </div>
                            <div class="hotw-about-info__body">
                                <h3 class="hotw-about-info__item-title"><?php echo esc_html($item['title']); ?></h3>
                                <p class="hotw-about-info__item-text"><?php echo esc_html($item['text']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="hotw-about-info__map">
                <iframe
                    title="<?php esc_attr_e('Map of Port Soderick', 'heros-on-the-water'); ?>"
                    src="<?php echo esc_url($args['map_embed']); ?>"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </div>
</section>
