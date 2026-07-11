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
    'badge'     => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'     => __('OUR TRUSTEES', 'heros-on-the-water'),
    'lead'      => __('The board guiding our charity with care, accountability, and purpose.', 'heros-on-the-water'),
    'trustees'  => array(
        array(__('Chairman', 'heros-on-the-water'), __('TONY PALMER', 'heros-on-the-water'), $uri . '/assets/images/g2.png'),
        array(__('Trustee', 'heros-on-the-water'), __('SARAH MITCHELL', 'heros-on-the-water'), $uri . '/assets/images/g3.png'),
        array(__('Trustee', 'heros-on-the-water'), __('JAMES CORLETT', 'heros-on-the-water'), $uri . '/assets/images/g4.png'),
        array(__('Trustee', 'heros-on-the-water'), __('EMMA QUAYLE', 'heros-on-the-water'), $uri . '/assets/images/g5.png'),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--white" aria-labelledby="hotw-trustees-title">
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
                        <img class="hotw-team-card__img" src="<?php echo esc_url($person[2]); ?>" alt="" width="320" height="320" loading="lazy">
                        <span class="hotw-badge hotw-badge--navy hotw-team-card__tag"><?php esc_html_e('TRUSTEES', 'heros-on-the-water'); ?></span>
                    </div>
                    <div class="hotw-team-card__body">
                        <p class="hotw-team-card__role"><?php echo esc_html($person[0]); ?></p>
                        <h3 class="hotw-team-card__name"><?php echo esc_html($person[1]); ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
