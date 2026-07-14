<?php
/**
 * Home hero with donate widget and values marquee.
 *
 * ACF group: home_hero under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$hero = function_exists('get_field') ? get_field('home_hero') : null;
if (!is_array($hero)) {
    $hero = array();
}

$image          = (isset($hero['image']) && is_array($hero['image'])) ? $hero['image'] : null;
$tags           = (!empty($hero['tags']) && is_array($hero['tags'])) ? $hero['tags'] : array();
$title          = isset($hero['title']) ? (string) $hero['title'] : '';
$description    = isset($hero['description']) ? (string) $hero['description'] : '';
$primary_button = (isset($hero['primary_button']) && is_array($hero['primary_button'])) ? $hero['primary_button'] : null;
$secondary_button = (isset($hero['secondary_button']) && is_array($hero['secondary_button'])) ? $hero['secondary_button'] : null;
$tagline        = isset($hero['tagline']) ? (string) $hero['tagline'] : '';

$image_url = (!empty($image['url'])) ? $image['url'] : '';
$image_alt = (!empty($image['alt'])) ? $image['alt'] : '';

$primary_url    = (!empty($primary_button['url'])) ? $primary_button['url'] : '';
$primary_title  = (!empty($primary_button['title'])) ? $primary_button['title'] : '';
$primary_target = (!empty($primary_button['target'])) ? $primary_button['target'] : '';

$secondary_url    = (!empty($secondary_button['url'])) ? $secondary_button['url'] : '';
$secondary_title  = (!empty($secondary_button['title'])) ? $secondary_button['title'] : '';
$secondary_target = (!empty($secondary_button['target'])) ? $secondary_button['target'] : '';

/* Donate card remains static (not ACF-driven). */
$donate_url = home_url('/donate/');
$amounts    = array(
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
        'value'  => '50',
        'label'  => __('£50/mo', 'heros-on-the-water'),
        'note'   => __('Helps provide refreshments', 'heros-on-the-water'),
        'active' => true,
    ),
    array(
        'value' => 'other',
        'label' => __('OTHER AMOUNT', 'heros-on-the-water'),
        'note'  => '',
    ),
);
$impact = __('Your donation helps veterans find healing, friendship, and purpose through paddle and fishing experiences.', 'heros-on-the-water');
?>
<section class="hotw-home-hero" aria-label="<?php esc_attr_e('Hero', 'heros-on-the-water'); ?>">
    <div class="hotw-home-hero__media">
        <?php if ($image_url) : ?>
            <img
                class="hotw-home-hero__img"
                src="<?php echo esc_url($image_url); ?>"
                alt="<?php echo esc_attr($image_alt); ?>"
                width="1920"
                height="900"
                loading="eager"
                fetchpriority="high"
            >
        <?php endif; ?>
        <div class="hotw-home-hero__overlay" aria-hidden="true"></div>
    </div>

    <div class="container hotw-home-hero__inner">
        <div class="hotw-home-hero__grid">
            <div class="hotw-home-hero__copy">
                <?php if ($tags) : ?>
                    <div class="hotw-home-hero__tags" aria-label="<?php esc_attr_e('Focus areas', 'heros-on-the-water'); ?>">
                        <?php
                        $tag_index = 0;
                        foreach ($tags as $tag) :
                            $label = isset($tag['label']) ? (string) $tag['label'] : '';
                            if ($label === '') {
                                continue;
                            }
                            $tag_class = (0 === $tag_index) ? 'hotw-home-hero__tag is-active' : 'hotw-home-hero__tag';
                            $tag_index++;
                            ?>
                            <span class="<?php echo esc_attr($tag_class); ?>"><?php echo esc_html($label); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($title !== '') : ?>
                    <h1 class="hotw-home-hero__title"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>

                <?php if ($description !== '') : ?>
                    <div class="hotw-home-hero__desc">
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($primary_url || $secondary_url) : ?>
                    <div class="hotw-home-hero__actions">
                        <?php if ($primary_url) : ?>
                            <a
                                class="hotw-btn hotw-btn--yellow"
                                href="<?php echo esc_url($primary_url); ?>"
                                <?php echo $primary_target ? 'target="' . esc_attr($primary_target) . '"' : ''; ?>
                                <?php echo $primary_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            >
                                <?php echo esc_html($primary_title !== '' ? $primary_title : __('Donate', 'heros-on-the-water')); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($secondary_url) : ?>
                            <a
                                class="hotw-btn hotw-btn--ghost-on-dark"
                                href="<?php echo esc_url($secondary_url); ?>"
                                <?php echo $secondary_target ? 'target="' . esc_attr($secondary_target) . '"' : ''; ?>
                                <?php echo $secondary_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            >
                                <?php echo esc_html($secondary_title !== '' ? $secondary_title : __('Learn more', 'heros-on-the-water')); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($tagline !== '') : ?>
                    <p class="hotw-home-hero__tagline"><?php echo esc_html($tagline); ?></p>
                <?php endif; ?>
            </div>

            <aside class="hotw-donate-card d-none" data-hotw-donate-widget aria-label="<?php esc_attr_e('Donation options', 'heros-on-the-water'); ?>">
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
                    <span><?php echo esc_html($impact); ?></span>
                </p>

                <a class="hotw-btn hotw-btn--yellow hotw-donate-card__submit" href="<?php echo esc_url($donate_url); ?>">
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
