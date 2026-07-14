<?php
/**
 * Team — patrons.
 *
 * ACF group: team_patrons (see acf-json/group_hotw_team.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('team_patrons') : null;
if (!is_array($section)) {
    $section = array();
}

$badge   = isset($section['badge']) ? (string) $section['badge'] : '';
$title   = isset($section['title']) ? (string) $section['title'] : '';
$lead    = isset($section['lead']) ? (string) $section['lead'] : '';
$members = (!empty($section['members']) && is_array($section['members'])) ? $section['members'] : array();
?>
<section class="hotw-block hotw-team-patrons-section" id="content-start" aria-labelledby="hotw-patrons-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title" id="hotw-patrons-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($lead !== '') : ?>
                <p class="hotw-section-lead"><?php echo esc_html($lead); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($members) : ?>
            <div class="hotw-team-patrons">
                <?php foreach ($members as $patron) : ?>
                    <?php
                    if (!is_array($patron)) {
                        continue;
                    }
                    $image   = (isset($patron['image']) && is_array($patron['image'])) ? $patron['image'] : null;
                    $name    = isset($patron['name']) ? (string) $patron['name'] : '';
                    $bio     = isset($patron['bio']) ? (string) $patron['bio'] : '';
                    $brand   = isset($patron['brand']) ? (string) $patron['brand'] : '';
                    $tag     = isset($patron['tag']) ? (string) $patron['tag'] : '';
                    $socials = (!empty($patron['social_links']) && is_array($patron['social_links'])) ? $patron['social_links'] : array();
                    $cta     = (isset($patron['cta']) && is_array($patron['cta'])) ? $patron['cta'] : null;
                    $img_url = (!empty($image['url'])) ? $image['url'] : '';
                    $img_alt = (!empty($image['alt'])) ? $image['alt'] : $name;
                    $cta_url = (!empty($cta['url'])) ? $cta['url'] : '';
                    $cta_title = (!empty($cta['title'])) ? $cta['title'] : '';
                    $cta_target = (!empty($cta['target'])) ? $cta['target'] : '';

                    if ($name === '' && $bio === '' && $img_url === '') {
                        continue;
                    }
                    ?>
                    <article class="hotw-patron-card">
                        <div class="hotw-patron-card__media">
                            <?php if ($img_url !== '') : ?>
                                <img
                                    class="hotw-patron-card__img"
                                    src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr($img_alt); ?>"
                                    width="480"
                                    height="520"
                                    loading="lazy"
                                    decoding="async"
                                >
                            <?php endif; ?>
                            <?php if ($tag !== '') : ?>
                                <span class="hotw-patron-card__tag"><?php echo esc_html($tag); ?></span>
                            <?php endif; ?>
                            <?php if ($socials) : ?>
                                <div class="hotw-team-social" aria-label="<?php esc_attr_e('Social links', 'heros-on-the-water'); ?>">
                                    <?php foreach ($socials as $social) : ?>
                                        <?php
                                        if (!is_array($social)) {
                                            continue;
                                        }
                                        $network = isset($social['network']) ? (string) $social['network'] : '';
                                        $url     = isset($social['url']) ? (string) $social['url'] : '';
                                        if ($url === '' || $network === '') {
                                            continue;
                                        }
                                        ?>
                                        <a
                                            class="hotw-team-social__link"
                                            href="<?php echo esc_url($url); ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="<?php echo esc_attr(hotw_social_network_label($network)); ?>"
                                        >
                                            <?php echo hotw_social_network_icon($network); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($brand !== '') : ?>
                                <span class="hotw-patron-card__brand">
                                    <span class="hotw-patron-card__brand-dot" aria-hidden="true"></span>
                                    <?php echo esc_html($brand); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="hotw-patron-card__body">
                            <?php if ($name !== '') : ?>
                                <h3 class="hotw-patron-card__name"><?php echo esc_html($name); ?></h3>
                            <?php endif; ?>
                            <?php if ($bio !== '') : ?>
                                <p class="hotw-patron-card__bio"><?php echo esc_html($bio); ?></p>
                            <?php endif; ?>
                            <?php if ($cta_url !== '') : ?>
                                <a
                                    class="hotw-patron-card__cta"
                                    href="<?php echo esc_url($cta_url); ?>"
                                    <?php echo $cta_target ? 'target="' . esc_attr($cta_target) . '"' : ''; ?>
                                    <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                >
                                    <span><?php echo esc_html($cta_title !== '' ? $cta_title : __('Read more', 'heros-on-the-water')); ?></span>
                                    <span class="hotw-patron-card__cta-icon" aria-hidden="true">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
