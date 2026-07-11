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
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR PATRONS', 'heros-on-the-water'),
    'lead'     => __('Distinguished supporters who champion our mission for veterans and families.', 'heros-on-the-water'),
    'patrons'  => array(
        array(
            'name' => __('LIEUTENANT GENERAL SIR JOHN LORIMER KCB DSO MBE', 'heros-on-the-water'),
            'bio'  => __('A distinguished military leader and advocate for veteran wellbeing, supporting Heroes on the Water in its mission to heal through nature.', 'heros-on-the-water'),
            'img'  => $uri . '/assets/images/g10.png',
        ),
        array(
            'name' => __('PATRON OF HEROES ON THE WATER', 'heros-on-the-water'),
            'bio'  => __('Committed to empowering veterans through outdoor adventure, community, and lasting connections on the Isle of Man.', 'heros-on-the-water'),
            'img'  => $uri . '/assets/images/g11.png',
        ),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray hotw-team-patrons-section" id="content-start" aria-labelledby="hotw-patrons-title">
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
                        <img class="hotw-patron-card__img" src="<?php echo esc_url($patron['img']); ?>" alt="" width="480" height="640" loading="lazy">
                        <span class="hotw-badge hotw-badge--navy hotw-patron-card__tag"><?php esc_html_e('PATRONS', 'heros-on-the-water'); ?></span>
                    </div>
                    <div class="hotw-patron-card__body">
                        <h3 class="hotw-patron-card__name"><?php echo esc_html($patron['name']); ?></h3>
                        <p class="hotw-patron-card__bio"><?php echo esc_html($patron['bio']); ?></p>
                        <a class="hotw-btn hotw-btn--yellow hotw-btn--sm" href="#"><?php esc_html_e('Read More', 'heros-on-the-water'); ?> →</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
