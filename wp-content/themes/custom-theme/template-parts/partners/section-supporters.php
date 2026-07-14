<?php
/**
 * Partners — supporters logo wall.
 *
 * ACF group: partners_supporters (see acf-json/group_hotw_partners.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('partners_supporters') : null;
if (!is_array($section)) {
    $section = array();
}

$badge    = isset($section['badge']) ? (string) $section['badge'] : '';
$title    = isset($section['title']) ? (string) $section['title'] : '';
$subtitle = isset($section['subtitle']) ? (string) $section['subtitle'] : '';
$caption  = isset($section['caption']) ? (string) $section['caption'] : '';
$logos    = (!empty($section['logos']) && is_array($section['logos'])) ? $section['logos'] : array();
?>
<section class="hotw-block hotw-supporters" id="content-start" aria-labelledby="hotw-supporters-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title hotw-supporters__title" id="hotw-supporters-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($subtitle !== '') : ?>
                <p class="hotw-section-subtitle hotw-supporters__subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($logos) : ?>
            <div class="hotw-logo-wall">
                <?php if ($caption !== '') : ?>
                    <span class="hotw-logo-wall__caption"><?php echo esc_html($caption); ?></span>
                <?php endif; ?>
                <ul class="hotw-logo-wall__grid">
                    <?php foreach ($logos as $row) : ?>
                        <?php
                        if (!is_array($row)) {
                            continue;
                        }
                        $image = (isset($row['image']) && is_array($row['image'])) ? $row['image'] : null;
                        $src   = (!empty($image['url'])) ? $image['url'] : '';
                        $alt   = (!empty($image['alt'])) ? $image['alt'] : '';
                        if ($src === '') {
                            continue;
                        }
                        ?>
                        <li class="hotw-logo-wall__item">
                            <img
                                src="<?php echo esc_url($src); ?>"
                                alt="<?php echo esc_attr($alt); ?>"
                                width="211"
                                height="211"
                                loading="lazy"
                            >
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>
