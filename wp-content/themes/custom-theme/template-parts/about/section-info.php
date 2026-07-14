<?php
/**
 * About Us — map, parking, keep bay green.
 *
 * ACF group: about_info (see acf-json/group_hotw_about.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$info = function_exists('get_field') ? get_field('about_info') : null;
if (!is_array($info)) {
    $info = array();
}

$badge     = isset($info['badge']) ? (string) $info['badge'] : '';
$title     = isset($info['title']) ? (string) $info['title'] : '';
$subtitle  = isset($info['subtitle']) ? (string) $info['subtitle'] : '';
$items     = (!empty($info['items']) && is_array($info['items'])) ? $info['items'] : array();
$map_embed = isset($info['map_embed']) ? (string) $info['map_embed'] : '';
?>
<section class="hotw-block hotw-about-info" id="content-start" aria-labelledby="hotw-about-info-title">
    <div class="container">
        <div class="hotw-about-info__grid">
            <div class="hotw-about-info__copy">
                <?php if ($badge !== '') : ?>
                    <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <?php if ($title !== '') : ?>
                    <h2 class="hotw-section-title hotw-about-info__title" id="hotw-about-info-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($subtitle !== '') : ?>
                    <p class="hotw-section-subtitle hotw-about-info__subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>

                <?php if ($items) : ?>
                    <div class="hotw-about-info__list">
                        <?php foreach ($items as $item) : ?>
                            <?php
                            if (!is_array($item)) {
                                continue;
                            }
                            $icon  = (isset($item['icon']) && is_array($item['icon'])) ? $item['icon'] : null;
                            $item_title = isset($item['title']) ? (string) $item['title'] : '';
                            $item_text  = isset($item['text']) ? (string) $item['text'] : '';
                            $icon_url = (!empty($icon['url'])) ? $icon['url'] : '';
                            if ($item_title === '' && $item_text === '' && $icon_url === '') {
                                continue;
                            }
                            ?>
                            <div class="hotw-about-info__item">
                                <?php if ($icon_url) : ?>
                                    <div class="hotw-about-info__icon-wrap" aria-hidden="true">
                                        <img
                                            class="hotw-about-info__icon"
                                            src="<?php echo esc_url($icon_url); ?>"
                                            alt=""
                                            width="62"
                                            height="83"
                                            loading="lazy"
                                        >
                                    </div>
                                <?php endif; ?>
                                <div class="hotw-about-info__body">
                                    <?php if ($item_title !== '') : ?>
                                        <h3 class="hotw-about-info__item-title"><?php echo esc_html($item_title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($item_text !== '') : ?>
                                        <p class="hotw-about-info__item-text"><?php echo esc_html($item_text); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($map_embed !== '') : ?>
                <div class="hotw-about-info__map">
                    <iframe
                        title="<?php esc_attr_e('Map of Port Soderick', 'heros-on-the-water'); ?>"
                        src="<?php echo esc_url($map_embed); ?>"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
