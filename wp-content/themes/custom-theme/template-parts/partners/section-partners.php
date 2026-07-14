<?php
/**
 * Partners — UK / USA partner cards.
 *
 * ACF group: partners_cards (see acf-json/group_hotw_partners.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('partners_cards') : null;
if (!is_array($section)) {
    $section = array();
}

$badge = isset($section['badge']) ? (string) $section['badge'] : '';
$title = isset($section['title']) ? (string) $section['title'] : '';
$lead  = isset($section['lead']) ? (string) $section['lead'] : '';
$items = (!empty($section['items']) && is_array($section['items'])) ? $section['items'] : array();
?>
<section class="hotw-block hotw-partners" aria-labelledby="hotw-partners-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title hotw-partners__title" id="hotw-partners-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($lead !== '') : ?>
                <p class="hotw-section-lead hotw-partners__lead"><?php echo esc_html($lead); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($items) : ?>
            <div class="hotw-partner-cards">
                <?php foreach ($items as $partner) : ?>
                    <?php
                    if (!is_array($partner)) {
                        continue;
                    }
                    $logo    = (isset($partner['logo']) && is_array($partner['logo'])) ? $partner['logo'] : null;
                    $eyebrow = isset($partner['eyebrow']) ? (string) $partner['eyebrow'] : '';
                    $p_title = isset($partner['title']) ? (string) $partner['title'] : '';
                    $text    = isset($partner['text']) ? (string) $partner['text'] : '';
                    $cta     = (isset($partner['cta']) && is_array($partner['cta'])) ? $partner['cta'] : null;
                    $logo_url = (!empty($logo['url'])) ? $logo['url'] : '';
                    $logo_alt = (!empty($logo['alt'])) ? $logo['alt'] : '';
                    $cta_url  = (!empty($cta['url'])) ? $cta['url'] : '';
                    $cta_title = (!empty($cta['title'])) ? $cta['title'] : '';
                    $cta_target = (!empty($cta['target'])) ? $cta['target'] : '';

                    if ($p_title === '' && $text === '' && $logo_url === '') {
                        continue;
                    }
                    ?>
                    <article class="hotw-partner-card">
                        <?php if ($logo_url !== '') : ?>
                            <div class="hotw-partner-card__media">
                                <img
                                    class="hotw-partner-card__logo"
                                    src="<?php echo esc_url($logo_url); ?>"
                                    alt="<?php echo esc_attr($logo_alt); ?>"
                                    width="354"
                                    height="330"
                                    loading="lazy"
                                >
                            </div>
                        <?php endif; ?>
                        <div class="hotw-partner-card__body">
                            <?php if ($eyebrow !== '') : ?>
                                <p class="hotw-partner-card__eyebrow"><?php echo esc_html($eyebrow); ?></p>
                            <?php endif; ?>
                            <?php if ($p_title !== '') : ?>
                                <h3 class="hotw-partner-card__title"><?php echo esc_html($p_title); ?></h3>
                            <?php endif; ?>
                            <?php if ($text !== '') : ?>
                                <p class="hotw-partner-card__text"><?php echo esc_html($text); ?></p>
                            <?php endif; ?>
                            <?php if ($cta_url !== '') : ?>
                                <a
                                    class="hotw-btn hotw-btn--yellow hotw-btn--sm hotw-partner-card__cta"
                                    href="<?php echo esc_url($cta_url); ?>"
                                    <?php echo $cta_target ? 'target="' . esc_attr($cta_target) . '"' : ''; ?>
                                    <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                >
                                    <?php echo esc_html($cta_title !== '' ? $cta_title : __('Find out more', 'heros-on-the-water')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
