<?php
/**
 * Home impact statistics — Making a Difference.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'        => __('IMPACT STATISTICS', 'heros-on-the-water'),
    'title_line1'  => __('MAKING A DIFFERENCE ACROSS', 'heros-on-the-water'),
    'title_prefix' => __('THE', 'heros-on-the-water'),
    'title_accent' => __('ISLE OF MAN', 'heros-on-the-water'),
    'description'  => __('We welcome all heroes and family members to our base, here are our latest figures of base visitors.', 'heros-on-the-water'),
    'background'   => array(
        'src' => $uri . '/assets/images/home/difference.webp',
        'alt' => '',
    ),
    'stats'        => array(
        array(
            'value' => '242',
            'label' => __('Last Month\'s Visitors', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-1.webp',
            'url'   => home_url('/events/'),
        ),
        array(
            'value' => '419',
            'label' => __('This Year\'s Visitors so far', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-2.webp',
            'url'   => home_url('/events/'),
        ),
        array(
            'value' => '44',
            'label' => __('The Dogs Visited', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-3.webp',
            'url'   => home_url('/events/'),
        ),
        array(
            'value' => '4070',
            'label' => __('Visitors in 2023', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-4.webp',
            'url'   => home_url('/events/'),
        ),
        array(
            'value' => '3384',
            'label' => __('Visitors in 2022', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-5.webp',
            'url'   => home_url('/events/'),
        ),
        array(
            'value' => '1065',
            'label' => __('Visitors in 2021', 'heros-on-the-water'),
            'icon'  => $uri . '/assets/images/home/d-icon-6.webp',
            'url'   => home_url('/events/'),
        ),
    ),
    'support_url'  => home_url('/donate/'),
    'donate_url'   => home_url('/donate/'),
    'rating'       => __('1800+ Happy Users And Customers.', 'heros-on-the-water'),
);

$args       = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$background = wp_parse_args(isset($args['background']) && is_array($args['background']) ? $args['background'] : array(), $defaults['background']);
$chevron    = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>';
$arrow      = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8"/></svg>';
?>
<section class="hotw-block hotw-impact" aria-labelledby="hotw-impact-title">
    <div class="hotw-impact__media" aria-hidden="true">
        <img
            class="hotw-impact__bg"
            src="<?php echo esc_url($background['src']); ?>"
            alt=""
            width="1921"
            height="1389"
            loading="lazy"
        >
    </div>

    <div class="container hotw-impact__content">
        <header class="hotw-impact__head">
            <span class="hotw-impact__ribbon"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-impact__title" id="hotw-impact-title">
                <span class="hotw-impact__title-line"><?php echo esc_html($args['title_line1']); ?></span>
                <span class="hotw-impact__title-line">
                    <?php echo esc_html($args['title_prefix']); ?>
                    <span class="hotw-impact__accent"><?php echo esc_html($args['title_accent']); ?></span>
                </span>
            </h2>
            <?php if (!empty($args['description'])) : ?>
                <p class="hotw-impact__desc"><?php echo esc_html($args['description']); ?></p>
            <?php endif; ?>
        </header>

        <div class="hotw-impact__grid">
            <?php foreach ($args['stats'] as $stat) : ?>
                <?php
                $value = isset($stat['value']) ? $stat['value'] : (isset($stat[0]) ? $stat[0] : '');
                $label = isset($stat['label']) ? $stat['label'] : (isset($stat[1]) ? $stat[1] : '');
                $icon  = isset($stat['icon']) ? $stat['icon'] : '';
                $url   = isset($stat['url']) ? $stat['url'] : '#';
                ?>
                <article class="hotw-impact-card">
                    <div class="hotw-impact-card__top">
                        <?php if ($icon) : ?>
                            <img
                                class="hotw-impact-card__icon"
                                src="<?php echo esc_url($icon); ?>"
                                alt=""
                                loading="lazy"
                            >
                        <?php endif; ?>
                        <a class="hotw-impact-card__btn" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr(sprintf(__('View more about %s', 'heros-on-the-water'), $label)); ?>">
                            <?php echo $arrow; ?>
                        </a>
                    </div>
                    <div class="hotw-impact-card__stat">
                        <span class="hotw-impact-card__num"><?php echo esc_html($value); ?></span>
                        <span class="hotw-impact-card__label"><?php echo esc_html($label); ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="hotw-impact__footer">
            <div class="hotw-impact__actions">
                <a class="hotw-impact__cta hotw-impact__cta--red" href="<?php echo esc_url($args['support_url']); ?>">
                    <span><?php esc_html_e('SUPPORT OUR MISSION', 'heros-on-the-water'); ?></span>
                    <span class="hotw-impact__cta-icon" aria-hidden="true"><?php echo $chevron; ?></span>
                </a>
                <a class="hotw-impact__cta hotw-impact__cta--navy" href="<?php echo esc_url($args['donate_url']); ?>">
                    <span><?php esc_html_e('DONATE HERE', 'heros-on-the-water'); ?></span>
                    <span class="hotw-impact__cta-icon" aria-hidden="true"><?php echo $chevron; ?></span>
                </a>
            </div>
            <div class="hotw-impact__rating">
                <span class="hotw-impact__stars" aria-hidden="true">★★★★★</span>
                <span class="hotw-impact__rating-text"><?php echo esc_html($args['rating']); ?></span>
            </div>
        </div>
    </div>
</section>
