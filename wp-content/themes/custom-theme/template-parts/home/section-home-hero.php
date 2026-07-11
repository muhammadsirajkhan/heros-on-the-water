<?php
/**
 * Home hero with donate widget and values marquee.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'tags'        => array(
        array('label' => __('PADDLE', 'heros-on-the-water'), 'active' => true),
        array('label' => __('FISH', 'heros-on-the-water'), 'active' => false),
        array('label' => __('HEAL', 'heros-on-the-water'), 'active' => false),
    ),
    'title'       => __('HEROES ON THE WATER ISLE MAN!', 'heros-on-the-water'),
    'description' => __('Heroes on the Water Isle of Man is a Charity That Provides Kayak Angling to Our Wounded Military and Uniformed Members of the Public Who Have Carrying Out a Public Duty.', 'heros-on-the-water'),
    'tagline'     => __('Happy Veterans • Building Friendships • Changing Lives', 'heros-on-the-water'),
    'donate_url'  => home_url('/donate/'),
    'events_url'  => home_url('/events/'),
    'bg'          => array(
        'src' => $uri . '/assets/images/home/hero.webp',
        'alt' => __('Veterans kayaking on the water at golden hour', 'heros-on-the-water'),
    ),
    'amounts'     => array(
        array(
            'value' => '10',
            'label' => __('£10/mo', 'heros-on-the-water'),
            'note'  => __('Helps provide refreshments', 'heros-on-the-water'),
        ),
        array(
            'value' => '20',
            'label' => __('£20/mo', 'heros-on-the-water'),
            'note'  => __('Helps provide refreshments', 'heros-on-the-water'),
        ),
        array(
            'value' => '50',
            'label' => __('£50/mo', 'heros-on-the-water'),
            'note'  => __('Helps provide refreshments', 'heros-on-the-water'),
            'active'=> true,
        ),
        array(
            'value' => 'other',
            'label' => __('OTHER AMOUNT', 'heros-on-the-water'),
            'note'  => '',
        ),
    ),
    'impact'      => __('Your donation helps veterans find healing, friendship, and purpose through paddle and fishing experiences.', 'heros-on-the-water'),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$bg   = wp_parse_args(isset($args['bg']) && is_array($args['bg']) ? $args['bg'] : array(), $defaults['bg']);
$tags = is_array($args['tags']) ? $args['tags'] : $defaults['tags'];
$amounts = is_array($args['amounts']) ? $args['amounts'] : $defaults['amounts'];
?>
<section class="hotw-home-hero" aria-label="<?php esc_attr_e('Hero', 'heros-on-the-water'); ?>">
    <div class="hotw-home-hero__media">
        <img
            class="hotw-home-hero__img"
            src="<?php echo esc_url($bg['src']); ?>"
            alt="<?php echo esc_attr($bg['alt']); ?>"
            width="1920"
            height="900"
            loading="eager"
            fetchpriority="high"
        >
        <div class="hotw-home-hero__overlay" aria-hidden="true"></div>
    </div>

    <div class="container hotw-home-hero__inner">
        <div class="hotw-home-hero__grid">
            <div class="hotw-home-hero__copy">
                <?php if ($tags) : ?>
                    <div class="hotw-home-hero__tags" aria-label="<?php esc_attr_e('Focus areas', 'heros-on-the-water'); ?>">
                        <?php foreach ($tags as $tag) : ?>
                            <?php
                            $is_active = !empty($tag['active']);
                            $tag_class = $is_active ? 'hotw-home-hero__tag is-active' : 'hotw-home-hero__tag';
                            ?>
                            <span class="<?php echo esc_attr($tag_class); ?>"><?php echo esc_html($tag['label']); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <h1 class="hotw-home-hero__title"><?php echo esc_html($args['title']); ?></h1>

                <div class="hotw-home-hero__desc">
                    <p><?php echo esc_html($args['description']); ?></p>
                </div>

                <div class="hotw-home-hero__actions">
                    <a class="hotw-btn hotw-btn--yellow" href="<?php echo esc_url($args['donate_url']); ?>">
                        <?php esc_html_e('DONATE NOW', 'heros-on-the-water'); ?>
                    </a>
                    <a class="hotw-btn hotw-btn--ghost-on-dark" href="<?php echo esc_url($args['events_url']); ?>">
                        <?php esc_html_e('JOIN AN EVENT', 'heros-on-the-water'); ?>
                    </a>
                </div>

                <?php if (!empty($args['tagline'])) : ?>
                    <p class="hotw-home-hero__tagline"><?php echo esc_html($args['tagline']); ?></p>
                <?php endif; ?>
            </div>

            <aside class="hotw-donate-card" data-hotw-donate-widget aria-label="<?php esc_attr_e('Donation options', 'heros-on-the-water'); ?>">
                <div class="hotw-donate-card__tabs" role="tablist" aria-label="<?php esc_attr_e('Donation frequency', 'heros-on-the-water'); ?>">
                    <button type="button" class="hotw-donate-card__tab is-active" role="tab" aria-selected="true" data-mode="monthly">
                        <?php esc_html_e('MONTHLY SUPPORT', 'heros-on-the-water'); ?>
                    </button>
                    <button type="button" class="hotw-donate-card__tab" role="tab" aria-selected="false" data-mode="once">
                        <?php esc_html_e('ONE-TIME DONATION', 'heros-on-the-water'); ?>
                    </button>
                </div>

                <p class="hotw-donate-card__heading"><?php esc_html_e('CHOOSE AN AMOUNT TO SUPPORT VETERANS', 'heros-on-the-water'); ?></p>

                <div class="hotw-donate-card__amounts" role="group" aria-label="<?php esc_attr_e('Donation amounts', 'heros-on-the-water'); ?>">
                    <?php foreach ($amounts as $amount) : ?>
                        <?php
                        $is_active = !empty($amount['active']);
                        $btn_class = $is_active ? 'hotw-donate-card__amount is-active' : 'hotw-donate-card__amount';
                        ?>
                        <button
                            type="button"
                            class="<?php echo esc_attr($btn_class); ?>"
                            data-amount="<?php echo esc_attr($amount['value']); ?>"
                        >
                            <span class="hotw-donate-card__amount-label"><?php echo esc_html($amount['label']); ?></span>
                            <?php if (!empty($amount['note'])) : ?>
                                <span class="hotw-donate-card__amount-note"><?php echo esc_html($amount['note']); ?></span>
                            <?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <p class="hotw-donate-card__impact">
                    <span class="hotw-donate-card__heart" aria-hidden="true">♥</span>
                    <span><?php echo esc_html($args['impact']); ?></span>
                </p>

                <a class="hotw-btn hotw-btn--yellow hotw-donate-card__submit" href="<?php echo esc_url($args['donate_url']); ?>">
                    <?php esc_html_e('DONATE NOW', 'heros-on-the-water'); ?>
                </a>
            </aside>
        </div>
    </div>

    <a class="hotw-home-hero__scroll" href="#content-start" aria-label="<?php esc_attr_e('Scroll down', 'heros-on-the-water'); ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M6 9l6 6 6-6"/>
        </svg>
    </a>

    <?php get_template_part('template-parts/shared/section', 'ticker'); ?>
</section>
