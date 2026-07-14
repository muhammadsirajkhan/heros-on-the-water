<?php
/**
 * Home impact statistics — Making a Difference.
 *
 * ACF group: home_impact under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$impact = function_exists('get_field') ? get_field('home_impact') : null;
if (!is_array($impact)) {
    $impact = array();
}

$background       = (isset($impact['background']) && is_array($impact['background'])) ? $impact['background'] : null;
$badge            = isset($impact['badge']) ? (string) $impact['badge'] : '';
$title_line1      = isset($impact['title_line1']) ? (string) $impact['title_line1'] : '';
$title_prefix     = isset($impact['title_prefix']) ? (string) $impact['title_prefix'] : '';
$title_accent     = isset($impact['title_accent']) ? (string) $impact['title_accent'] : '';
$description      = isset($impact['description']) ? (string) $impact['description'] : '';
$stats            = (!empty($impact['stats']) && is_array($impact['stats'])) ? $impact['stats'] : array();
$support_button   = (isset($impact['support_button']) && is_array($impact['support_button'])) ? $impact['support_button'] : null;
$donate_button    = (isset($impact['donate_button']) && is_array($impact['donate_button'])) ? $impact['donate_button'] : null;
$rating           = isset($impact['rating']) ? (string) $impact['rating'] : '';

$bg_url = (!empty($background['url'])) ? $background['url'] : '';

$support_url    = (!empty($support_button['url'])) ? $support_button['url'] : '';
$support_title  = (!empty($support_button['title'])) ? $support_button['title'] : '';
$support_target = (!empty($support_button['target'])) ? $support_button['target'] : '';

$donate_url    = (!empty($donate_button['url'])) ? $donate_button['url'] : '';
$donate_title  = (!empty($donate_button['title'])) ? $donate_button['title'] : '';
$donate_target = (!empty($donate_button['target'])) ? $donate_button['target'] : '';

$chevron = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>';
$arrow   = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8"/></svg>';
?>
<section class="hotw-block hotw-impact" aria-labelledby="hotw-impact-title">
    <?php if ($bg_url) : ?>
        <div class="hotw-impact__media" aria-hidden="true">
            <img
                class="hotw-impact__bg"
                src="<?php echo esc_url($bg_url); ?>"
                alt=""
                width="1921"
                height="1389"
                loading="lazy"
            >
        </div>
    <?php endif; ?>

    <div class="container hotw-impact__content">
        <header class="hotw-impact__head">
            <?php if ($badge !== '') : ?>
                <span class="hotw-impact__ribbon"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title_line1 !== '' || $title_prefix !== '' || $title_accent !== '') : ?>
                <h2 class="hotw-impact__title" id="hotw-impact-title">
                    <?php if ($title_line1 !== '') : ?>
                        <span class="hotw-impact__title-line"><?php echo esc_html($title_line1); ?></span>
                    <?php endif; ?>
                    <?php if ($title_prefix !== '' || $title_accent !== '') : ?>
                        <span class="hotw-impact__title-line">
                            <?php echo esc_html($title_prefix); ?>
                            <?php if ($title_accent !== '') : ?>
                                <span class="hotw-impact__accent"><?php echo esc_html($title_accent); ?></span>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if ($description !== '') : ?>
                <p class="hotw-impact__desc"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($stats) : ?>
            <div class="hotw-impact__grid">
                <?php foreach ($stats as $stat) : ?>
                    <?php
                    if (!is_array($stat)) {
                        continue;
                    }
                    $value = isset($stat['value']) ? (string) $stat['value'] : '';
                    $label = isset($stat['label']) ? (string) $stat['label'] : '';
                    $icon  = (isset($stat['icon']) && is_array($stat['icon'])) ? $stat['icon'] : null;
                    $link  = (isset($stat['link']) && is_array($stat['link'])) ? $stat['link'] : null;
                    $url   = (!empty($link['url'])) ? $link['url'] : '';
                    $target = (!empty($link['target'])) ? $link['target'] : '';
                    $icon_url = (!empty($icon['url'])) ? $icon['url'] : '';
                    if ($value === '' && $label === '') {
                        continue;
                    }
                    ?>
                    <article class="hotw-impact-card">
                        <div class="hotw-impact-card__top">
                            <?php if ($icon_url) : ?>
                                <img
                                    class="hotw-impact-card__icon"
                                    src="<?php echo esc_url($icon_url); ?>"
                                    alt=""
                                    loading="lazy"
                                >
                            <?php endif; ?>
                            <?php if ($url) : ?>
                                <a
                                    class="hotw-impact-card__btn"
                                    href="<?php echo esc_url($url); ?>"
                                    <?php echo $target ? 'target="' . esc_attr($target) . '"' : ''; ?>
                                    <?php echo $target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                    aria-label="<?php echo esc_attr(sprintf(__('View more about %s', 'heros-on-the-water'), $label !== '' ? $label : __('stat', 'heros-on-the-water'))); ?>"
                                >
                                    <?php echo $arrow; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hotw-impact-card__stat">
                            <?php if ($value !== '') : ?>
                                <span class="hotw-impact-card__num"><?php echo esc_html($value); ?></span>
                            <?php endif; ?>
                            <?php if ($label !== '') : ?>
                                <span class="hotw-impact-card__label"><?php echo esc_html($label); ?></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="hotw-impact__footer">
            <?php if ($support_url || $donate_url) : ?>
                <div class="hotw-impact__actions">
                    <?php if ($support_url) : ?>
                        <a
                            class="hotw-impact__cta hotw-impact__cta--red"
                            href="<?php echo esc_url($support_url); ?>"
                            <?php echo $support_target ? 'target="' . esc_attr($support_target) . '"' : ''; ?>
                            <?php echo $support_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                        >
                            <span><?php echo esc_html($support_title !== '' ? $support_title : __('Support our mission', 'heros-on-the-water')); ?></span>
                            <span class="hotw-impact__cta-icon" aria-hidden="true"><?php echo $chevron; ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ($donate_url) : ?>
                        <a
                            class="hotw-impact__cta hotw-impact__cta--navy"
                            href="<?php echo esc_url($donate_url); ?>"
                            <?php echo $donate_target ? 'target="' . esc_attr($donate_target) . '"' : ''; ?>
                            <?php echo $donate_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                        >
                            <span><?php echo esc_html($donate_title !== '' ? $donate_title : __('Donate', 'heros-on-the-water')); ?></span>
                            <span class="hotw-impact__cta-icon" aria-hidden="true"><?php echo $chevron; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($rating !== '') : ?>
                <div class="hotw-impact__rating">
                    <span class="hotw-impact__stars" aria-hidden="true">★★★★★</span>
                    <span class="hotw-impact__rating-text"><?php echo esc_html($rating); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
