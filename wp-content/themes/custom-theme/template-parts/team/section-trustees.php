<?php
/**
 * Team — trustees.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR TRUSTEES', 'heros-on-the-water'),
    'lead'     => __('The board guiding our charity with care, accountability, and purpose.', 'heros-on-the-water'),
    'trustees' => array(
        array(
            'role'   => __('Chairman', 'heros-on-the-water'),
            'name'   => __('TONY PALMER', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/t-1.webp',
            'tag'    => __('TRUSTEES', 'heros-on-the-water'),
            'url'    => '#',
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
        ),
        array(
            'role'   => __('Building Custodian', 'heros-on-the-water'),
            'name'   => __('P DRAKE', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/t-2.webp',
            'tag'    => __('TRUSTEES', 'heros-on-the-water'),
            'url'    => '#',
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
        ),
        array(
            'role'   => __('Rhodesian Army Veteran', 'heros-on-the-water'),
            'name'   => __('B BYRNE', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/t-3.webp',
            'tag'    => __('TRUSTEES', 'heros-on-the-water'),
            'url'    => '#',
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
        ),
        array(
            'role'   => __('RAF Veteran', 'heros-on-the-water'),
            'name'   => __('PETER MARVEN', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/t-4.webp',
            'tag'    => __('TRUSTEES', 'heros-on-the-water'),
            'url'    => '#',
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-team-trustees-section" aria-labelledby="hotw-trustees-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-trustees-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead"><?php echo esc_html($args['lead']); ?></p>
        </header>
        <div class="hotw-team-grid">
            <?php foreach ($args['trustees'] as $person) : ?>
                <article class="hotw-team-card">
                    <div class="hotw-team-card__media">
                        <img
                            class="hotw-team-card__img"
                            src="<?php echo esc_url($person['img']); ?>"
                            alt="<?php echo esc_attr($person['name']); ?>"
                            width="320"
                            height="360"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="hotw-team-card__tag"><?php echo esc_html($person['tag']); ?></span>
                        <?php if (!empty($person['social']) && is_array($person['social'])) : ?>
                            <div class="hotw-team-social" aria-label="<?php esc_attr_e('Social links', 'heros-on-the-water'); ?>">
                                <?php foreach ($person['social'] as $social) : ?>
                                    <a class="hotw-team-social__link" href="<?php echo esc_url($social['url']); ?>" aria-label="<?php echo esc_attr($social['label']); ?>">
                                        <?php if ($social['network'] === 'facebook') : ?>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                        <?php elseif ($social['network'] === 'instagram') : ?>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                        <?php else : ?>
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.727-8.829L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="hotw-team-card__body">
                        <div class="hotw-team-card__copy">
                            <?php if (!empty($person['role'])) : ?>
                                <p class="hotw-team-card__role"><?php echo esc_html($person['role']); ?></p>
                            <?php endif; ?>
                            <h3 class="hotw-team-card__name"><?php echo esc_html($person['name']); ?></h3>
                        </div>
                        <a
                            class="hotw-visitors-card__btn hotw-team-card__btn"
                            href="<?php echo esc_url($person['url']); ?>"
                            aria-label="<?php echo esc_attr(sprintf(__('View profile for %s', 'heros-on-the-water'), $person['name'])); ?>"
                        >
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                                <path d="M7 17L17 7M17 7H8M17 7v9"/>
                            </svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
