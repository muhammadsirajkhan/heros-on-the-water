<?php
/**
 * Home mission section.
 *
 * ACF group: home_mission under Home Page tabs (see acf-json/group_hotw_home.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$mission = function_exists('get_field') ? get_field('home_mission') : null;
if (!is_array($mission)) {
    $mission = array();
}

$image   = (isset($mission['image']) && is_array($mission['image'])) ? $mission['image'] : null;
$badge   = isset($mission['badge']) ? (string) $mission['badge'] : '';
$title   = isset($mission['title']) ? (string) $mission['title'] : '';
$subtitle = isset($mission['subtitle']) ? (string) $mission['subtitle'] : '';
$content = isset($mission['content']) ? (string) $mission['content'] : '';
$quote   = isset($mission['quote']) ? (string) $mission['quote'] : '';
$cta     = (isset($mission['cta']) && is_array($mission['cta'])) ? $mission['cta'] : null;

$image_url = (!empty($image['url'])) ? $image['url'] : '';
$image_alt = (!empty($image['alt'])) ? $image['alt'] : '';

$cta_url    = (!empty($cta['url'])) ? $cta['url'] : '';
$cta_title  = (!empty($cta['title'])) ? $cta['title'] : '';
$cta_target = (!empty($cta['target'])) ? $cta['target'] : '';
?>
<section class="hotw-block hotw-mission" id="content-start" aria-labelledby="hotw-mission-title">
    <div class="container">
        <div class="hotw-mission__grid">
            <div class="hotw-mission__copy">
                <?php if ($badge !== '') : ?>
                    <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>

                <?php if ($title !== '') : ?>
                    <h2 class="hotw-section-title" id="hotw-mission-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($subtitle !== '') : ?>
                    <p class="hotw-section-subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>

                <?php if ($content !== '') : ?>
                    <div class="hotw-prose hotw-mission__prose">
                        <p><?php echo esc_html($content); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($quote !== '') : ?>
                    <p class="hotw-mission__quote"><?php echo esc_html($quote); ?></p>
                <?php endif; ?>

                <?php if ($cta_url) : ?>
                    <a
                        class="hotw-btn hotw-mission__cta"
                        href="<?php echo esc_url($cta_url); ?>"
                        <?php echo $cta_target ? 'target="' . esc_attr($cta_target) . '"' : ''; ?>
                        <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                    >
                        <span><?php echo esc_html($cta_title !== '' ? $cta_title : __('Donate', 'heros-on-the-water')); ?></span>
                        <span class="hotw-mission__cta-icon" aria-hidden="true">&raquo;</span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="hotw-mission__media">
                <?php if ($image_url) : ?>
                    <img
                        class="hotw-mission__img"
                        src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr($image_alt); ?>"
                        width="800"
                        height="600"
                        loading="lazy"
                    >
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
