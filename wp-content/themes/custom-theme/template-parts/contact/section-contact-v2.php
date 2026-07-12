<?php
/**
 * Contact Us — info cards + Contact Form 7 message panel.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$defaults = array(
    'badge'         => __('LET\'S TALK', 'heros-on-the-water'),
    'title'         => __('GET IN TOUCH', 'heros-on-the-water'),
    'subtitle'      => __('SUPPORT STARTS WITH A CONVERSATION', 'heros-on-the-water'),
    'info_heading'  => __('CONTACT INFORMATION', 'heros-on-the-water'),
    'charity_line'  => __('Manx registered charity number: 1248', 'heros-on-the-water'),
    'trustees_line' => __('Trustees: T Palmer, P Drake, B Byrne, P Marvin, A Brooks', 'heros-on-the-water'),
    'phone'         => '07624 336380',
    'email'         => 'heroesonthewateriom2026@outlook.com',
    'address'       => __('5 Carnane View, Ballakilley, Port St Mary, IM9 5NR', 'heros-on-the-water'),
    'form_title'    => __('SEND US A MESSAGE', 'heros-on-the-water'),
    'form_intro'    => __('For any queries, please do not hesitate to contact us either by phone, e-mail or social media. Or fill out the form below.', 'heros-on-the-water'),
    'cf7_shortcode' => '[contact-form-7 id="CONTACT_FORM_ID" title="Get In Touch" html_class="hotw-cf7-touch"]',
    'icons'         => array(
        'phone'   => $uri . '/assets/images/contact-us/left-1.webp',
        'email'   => $uri . '/assets/images/contact-us/left-2.webp',
        'address' => $uri . '/assets/images/contact-us/left-3.webp',
    ),
);

$args  = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
$icons = wp_parse_args(isset($args['icons']) && is_array($args['icons']) ? $args['icons'] : array(), $defaults['icons']);

$phone_href = 'tel:' . preg_replace('/\s+/', '', $args['phone']);
$email_href = 'mailto:' . sanitize_email($args['email']);

$social = array(
    array('label' => __('Facebook', 'heros-on-the-water'), 'svg' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>'),
    array('label' => __('Instagram', 'heros-on-the-water'), 'svg' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>'),
    array('label' => __('YouTube', 'heros-on-the-water'), 'svg' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon fill="currentColor" points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>'),
    array('label' => __('X', 'heros-on-the-water'), 'svg' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.727-8.829L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>'),
    array('label' => __('TikTok', 'heros-on-the-water'), 'svg' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.16 15.3a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.7a8.2 8.2 0 0 0 4.76 1.52V6.8a4.85 4.85 0 0 1-1.01-.11z"/></svg>'),
    array('label' => __('LinkedIn', 'heros-on-the-water'), 'svg' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>'),
);

$cf7 = trim((string) $args['cf7_shortcode']);
$has_cf7 = $cf7 !== '' && strpos($cf7, 'CONTACT_FORM_ID') === false && shortcode_exists('contact-form-7');
?>
<section class="hotw-block hotw-contact-v2" id="content-start" aria-labelledby="hotw-contact-title">
    <div class="container">
        <header class="hotw-contact-v2__head">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title hotw-contact-v2__title" id="hotw-contact-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle hotw-contact-v2__subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>

        <div class="hotw-contact-v2__grid">
            <div class="hotw-contact-v2__info">
                <h3 class="hotw-contact-v2__info-title"><?php echo esc_html($args['info_heading']); ?></h3>
                <div class="hotw-contact-v2__meta">
                    <p><?php echo esc_html($args['charity_line']); ?></p>
                    <p><?php echo esc_html($args['trustees_line']); ?></p>
                </div>

                <div class="hotw-contact-v2__cards">
                    <div class="hotw-contact-info-card">
                        <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['phone']); ?>" alt="" loading="lazy">
                        <div class="hotw-contact-info-card__body">
                            <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Call Us Now', 'heros-on-the-water'); ?></h4>
                            <a class="hotw-contact-info-card__value" href="<?php echo esc_url($phone_href); ?>"><?php echo esc_html($args['phone']); ?></a>
                        </div>
                    </div>
                    <div class="hotw-contact-info-card">
                        <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['email']); ?>" alt="" loading="lazy">
                        <div class="hotw-contact-info-card__body">
                            <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Email Us', 'heros-on-the-water'); ?></h4>
                            <a class="hotw-contact-info-card__value" href="<?php echo esc_url($email_href); ?>"><?php echo esc_html($args['email']); ?></a>
                        </div>
                    </div>
                    <div class="hotw-contact-info-card hotw-contact-info-card--wide">
                        <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['address']); ?>" alt="" loading="lazy">
                        <div class="hotw-contact-info-card__body">
                            <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Registered Address', 'heros-on-the-water'); ?></h4>
                            <p class="hotw-contact-info-card__value"><?php echo esc_html($args['address']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="hotw-contact-v2__social-row">
                    <p class="hotw-contact-v2__social-label"><?php esc_html_e('Stay Social With us:', 'heros-on-the-water'); ?></p>
                    <div class="hotw-contact-v2__social">
                        <?php foreach ($social as $item) : ?>
                            <a class="hotw-contact-v2__social-link" href="#" aria-label="<?php echo esc_attr($item['label']); ?>">
                                <?php echo $item['svg']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="hotw-contact-v2__panel">
                <h3 class="hotw-contact-v2__panel-title"><?php echo esc_html($args['form_title']); ?></h3>
                <p class="hotw-contact-v2__panel-intro"><?php echo esc_html($args['form_intro']); ?></p>

                <div class="hotw-contact-v2__cf7">
                    <?php if ($has_cf7) : ?>
                        <?php echo do_shortcode($cf7); ?>
                    <?php else : ?>
                        <p class="hotw-contact-v2__cf7-fallback">
                            <?php esc_html_e('Add your Contact Form 7 shortcode in contact-page.php (cf7_shortcode) after creating the form in WP Admin.', 'heros-on-the-water'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
