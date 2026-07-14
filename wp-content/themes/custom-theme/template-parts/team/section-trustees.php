<?php
/**
 * Team — trustees.
 *
 * ACF group: team_trustees (see acf-json/group_hotw_team.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$section = function_exists('get_field') ? get_field('team_trustees') : null;
if (!is_array($section)) {
    $section = array();
}

$badge   = isset($section['badge']) ? (string) $section['badge'] : '';
$title   = isset($section['title']) ? (string) $section['title'] : '';
$lead    = isset($section['lead']) ? (string) $section['lead'] : '';
$members = (!empty($section['members']) && is_array($section['members'])) ? $section['members'] : array();
?>
<section class="hotw-block hotw-team-trustees-section" aria-labelledby="hotw-trustees-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title" id="hotw-trustees-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($lead !== '') : ?>
                <p class="hotw-section-lead"><?php echo esc_html($lead); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($members) : ?>
            <div class="hotw-team-grid">
                <?php foreach ($members as $person) : ?>
                    <?php
                    if (!is_array($person)) {
                        continue;
                    }
                    $image   = (isset($person['image']) && is_array($person['image'])) ? $person['image'] : null;
                    $role    = isset($person['role']) ? (string) $person['role'] : '';
                    $name    = isset($person['name']) ? (string) $person['name'] : '';
                    $tag     = isset($person['tag']) ? (string) $person['tag'] : '';
                    $socials = (!empty($person['social_links']) && is_array($person['social_links'])) ? $person['social_links'] : array();
                    $link    = (isset($person['profile_link']) && is_array($person['profile_link'])) ? $person['profile_link'] : null;
                    $img_url = (!empty($image['url'])) ? $image['url'] : '';
                    $img_alt = (!empty($image['alt'])) ? $image['alt'] : $name;
                    $url     = (!empty($link['url'])) ? $link['url'] : '';
                    $target  = (!empty($link['target'])) ? $link['target'] : '';

                    if ($name === '' && $role === '' && $img_url === '') {
                        continue;
                    }
                    ?>
                    <article class="hotw-team-card">
                        <div class="hotw-team-card__media">
                            <?php if ($img_url !== '') : ?>
                                <img
                                    class="hotw-team-card__img"
                                    src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr($img_alt); ?>"
                                    width="320"
                                    height="360"
                                    loading="lazy"
                                    decoding="async"
                                >
                            <?php endif; ?>
                            <?php if ($tag !== '') : ?>
                                <span class="hotw-team-card__tag"><?php echo esc_html($tag); ?></span>
                            <?php endif; ?>
                            <?php if ($socials) : ?>
                                <div class="hotw-team-social" aria-label="<?php esc_attr_e('Social links', 'heros-on-the-water'); ?>">
                                    <?php foreach ($socials as $social) : ?>
                                        <?php
                                        if (!is_array($social)) {
                                            continue;
                                        }
                                        $network = isset($social['network']) ? (string) $social['network'] : '';
                                        $s_url   = isset($social['url']) ? (string) $social['url'] : '';
                                        if ($s_url === '' || $network === '') {
                                            continue;
                                        }
                                        ?>
                                        <a
                                            class="hotw-team-social__link"
                                            href="<?php echo esc_url($s_url); ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="<?php echo esc_attr(hotw_social_network_label($network)); ?>"
                                        >
                                            <?php echo hotw_social_network_icon($network); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="hotw-team-card__body">
                            <div class="hotw-team-card__copy">
                                <?php if ($role !== '') : ?>
                                    <p class="hotw-team-card__role"><?php echo esc_html($role); ?></p>
                                <?php endif; ?>
                                <?php if ($name !== '') : ?>
                                    <h3 class="hotw-team-card__name"><?php echo esc_html($name); ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if ($url !== '') : ?>
                                <a
                                    class="hotw-visitors-card__btn hotw-team-card__btn"
                                    href="<?php echo esc_url($url); ?>"
                                    <?php echo $target ? 'target="' . esc_attr($target) . '"' : ''; ?>
                                    <?php echo $target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                    aria-label="<?php echo esc_attr(sprintf(__('View profile for %s', 'heros-on-the-water'), $name !== '' ? $name : __('team member', 'heros-on-the-water'))); ?>"
                                >
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                                        <path d="M7 17L17 7M17 7H8M17 7v9"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
