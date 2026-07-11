<?php
/**
 * Partners — supporters logo wall.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR SUPPORTERS', 'heros-on-the-water'),
    'subtitle' => __('SOME OF THE WONDERFUL COMPANIES WHO\'VE HELPED US ON OUR JOURNEY', 'heros-on-the-water'),
    'logos'    => array(
        $uri . '/assets/images/header-logo.png',
        $uri . '/assets/images/footer-logo.png',
        $uri . '/assets/images/form-logo.png',
        $uri . '/assets/images/header-logo.png',
        $uri . '/assets/images/footer-logo.png',
        $uri . '/assets/images/form-logo.png',
        $uri . '/assets/images/header-logo.png',
        $uri . '/assets/images/footer-logo.png',
        $uri . '/assets/images/form-logo.png',
        $uri . '/assets/images/header-logo.png',
        $uri . '/assets/images/footer-logo.png',
        $uri . '/assets/images/form-logo.png',
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray" id="content-start" aria-labelledby="hotw-supporters-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-supporters-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>
        <div class="hotw-logo-wall">
            <span class="hotw-logo-wall__caption"><?php esc_html_e('Our Supporters', 'heros-on-the-water'); ?></span>
            <div class="hotw-logo-wall__grid">
                <?php foreach ($args['logos'] as $logo) : ?>
                    <div class="hotw-logo-wall__item">
                        <img src="<?php echo esc_url($logo); ?>" alt="" width="120" height="120" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
