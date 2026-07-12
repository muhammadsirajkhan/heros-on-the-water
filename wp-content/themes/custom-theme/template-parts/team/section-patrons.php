<?php
/**
 * Team — patrons.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'   => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'   => __('OUR PATRONS', 'heros-on-the-water'),
    'lead'    => __('Thank you to everyone involved in the building of our base', 'heros-on-the-water'),
    'patrons' => array(
        array(
            'name'   => __('LIEUTENANT GENERAL SIR JOHN LORIMER KCB DSO MBE', 'heros-on-the-water'),
            'bio'    => __('Lieutenant General Sir John Lorimer was educated at Marlborough College, Wiltshire and Pembroke College, University of Cambridge. He joined the British Army in 1981 and was commissioned.', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/patron-1.webp',
            'alt'    => __('Lieutenant General Sir John Lorimer', 'heros-on-the-water'),
            'brand'  => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
            'cta'    => array(
                'label' => __('READ MORE', 'heros-on-the-water'),
                'url'   => '#',
            ),
        ),
        array(
            'name'   => __('LADY PHILIPPA LORIMER MBE', 'heros-on-the-water'),
            'bio'    => __('As an Army daughter, Lady Lorimer spent much of her childhood overseas – in Africa, Germany and Norway. She went to school in Dorset and then went on to read Natural Sciences at Durham University.', 'heros-on-the-water'),
            'img'    => $uri . '/assets/images/meet-the-team/patron-2.webp',
            'alt'    => __('Lady Philippa Lorimer MBE', 'heros-on-the-water'),
            'brand'  => __('HEROES ON THE WATER', 'heros-on-the-water'),
            'social' => array(
                array('network' => 'facebook', 'label' => __('Facebook', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'instagram', 'label' => __('Instagram', 'heros-on-the-water'), 'url' => '#'),
                array('network' => 'x', 'label' => __('X', 'heros-on-the-water'), 'url' => '#'),
            ),
            'cta'    => array(
                'label' => __('READ MORE', 'heros-on-the-water'),
                'url'   => '#',
            ),
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-team-patrons-section" id="content-start" aria-labelledby="hotw-patrons-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-patrons-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-lead"><?php echo esc_html($args['lead']); ?></p>
        </header>
        <div class="hotw-team-patrons">
            <?php foreach ($args['patrons'] as $patron) : ?>
                <article class="hotw-patron-card">
                    <div class="hotw-patron-card__media">
                        <img
                            class="hotw-patron-card__img"
                            src="<?php echo esc_url($patron['img']); ?>"
                            alt="<?php echo esc_attr(isset($patron['alt']) ? $patron['alt'] : $patron['name']); ?>"
                            width="480"
                            height="520"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="hotw-patron-card__tag"><?php esc_html_e('PATRONS', 'heros-on-the-water'); ?></span>
                        <?php if (!empty($patron['social']) && is_array($patron['social'])) : ?>
                            <div class="hotw-team-social" aria-label="<?php esc_attr_e('Social links', 'heros-on-the-water'); ?>">
                                <?php foreach ($patron['social'] as $social) : ?>
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
                        <?php if (!empty($patron['brand'])) : ?>
                            <span class="hotw-patron-card__brand">
                                <span class="hotw-patron-card__brand-dot" aria-hidden="true"></span>
                                <?php echo esc_html($patron['brand']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="hotw-patron-card__body">
                        <h3 class="hotw-patron-card__name"><?php echo esc_html($patron['name']); ?></h3>
                        <p class="hotw-patron-card__bio"><?php echo esc_html($patron['bio']); ?></p>
                        <?php if (!empty($patron['cta']['label'])) : ?>
                            <a class="hotw-patron-card__cta" href="<?php echo esc_url($patron['cta']['url']); ?>">
                                <span><?php echo esc_html($patron['cta']['label']); ?></span>
                                <span class="hotw-patron-card__cta-icon" aria-hidden="true">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
