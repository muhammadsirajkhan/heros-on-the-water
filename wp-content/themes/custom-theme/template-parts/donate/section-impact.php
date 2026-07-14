<?php
/**
 * Donate — every pound makes a difference.
 *
 * ACF group: donate_impact (see acf-json/group_hotw_donate.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$impact = function_exists('get_field') ? get_field('donate_impact') : null;
if (!is_array($impact)) {
    $impact = array();
}

$badge       = isset($impact['badge']) ? (string) $impact['badge'] : '';
$title       = isset($impact['title']) ? (string) $impact['title'] : '';
$paragraphs  = (!empty($impact['paragraphs']) && is_array($impact['paragraphs'])) ? $impact['paragraphs'] : array();
$subtitle    = isset($impact['subtitle']) ? (string) $impact['subtitle'] : '';
$closing     = isset($impact['closing']) ? (string) $impact['closing'] : '';
$image_main  = (isset($impact['image_main']) && is_array($impact['image_main'])) ? $impact['image_main'] : null;
$image_side_1 = (isset($impact['image_side_1']) && is_array($impact['image_side_1'])) ? $impact['image_side_1'] : null;
$image_side_2 = (isset($impact['image_side_2']) && is_array($impact['image_side_2'])) ? $impact['image_side_2'] : null;

$main_url   = (!empty($image_main['url'])) ? $image_main['url'] : '';
$main_alt   = (!empty($image_main['alt'])) ? $image_main['alt'] : '';
$side1_url  = (!empty($image_side_1['url'])) ? $image_side_1['url'] : '';
$side1_alt  = (!empty($image_side_1['alt'])) ? $image_side_1['alt'] : '';
$side2_url  = (!empty($image_side_2['url'])) ? $image_side_2['url'] : '';
$side2_alt  = (!empty($image_side_2['alt'])) ? $image_side_2['alt'] : '';
$has_images = ($main_url !== '' || $side1_url !== '' || $side2_url !== '');
?>
<section class="hotw-block hotw-donate-impact" id="content-start" aria-labelledby="hotw-donate-impact-title">
    <div class="container">
        <div class="hotw-donate-impact__grid">
            <?php if ($has_images) : ?>
                <div class="hotw-donate-collage">
                    <?php if ($main_url !== '') : ?>
                        <img
                            class="hotw-donate-collage__main"
                            src="<?php echo esc_url($main_url); ?>"
                            alt="<?php echo esc_attr($main_alt); ?>"
                            width="480"
                            height="640"
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>
                    <?php if ($side1_url !== '') : ?>
                        <img
                            class="hotw-donate-collage__side"
                            src="<?php echo esc_url($side1_url); ?>"
                            alt="<?php echo esc_attr($side1_alt); ?>"
                            width="320"
                            height="280"
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>
                    <?php if ($side2_url !== '') : ?>
                        <img
                            class="hotw-donate-collage__side"
                            src="<?php echo esc_url($side2_url); ?>"
                            alt="<?php echo esc_attr($side2_alt); ?>"
                            width="320"
                            height="280"
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="hotw-donate-impact__copy">
                <?php if ($badge !== '') : ?>
                    <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <?php if ($title !== '') : ?>
                    <h2 class="hotw-section-title" id="hotw-donate-impact-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($paragraphs) : ?>
                    <div class="hotw-prose hotw-donate-impact__prose">
                        <?php foreach ($paragraphs as $row) : ?>
                            <?php
                            $text = (is_array($row) && isset($row['text'])) ? (string) $row['text'] : '';
                            if ($text === '') {
                                continue;
                            }
                            ?>
                            <p><?php echo esc_html($text); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($subtitle !== '') : ?>
                    <h3 class="hotw-section-subtitle hotw-donate-impact__subtitle"><?php echo esc_html($subtitle); ?></h3>
                <?php endif; ?>
                <?php if ($closing !== '') : ?>
                    <div class="hotw-prose hotw-donate-impact__prose">
                        <p><?php echo esc_html($closing); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
