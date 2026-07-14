<?php
/**
 * Contact Us — info cards + Contact Form 7 message panel.
 *
 * ACF group: contact_info (see acf-json/group_hotw_contact.json).
 * CF7 shortcode is passed via $args from contact-page.php.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();

$info = function_exists('get_field') ? get_field('contact_info') : null;
if (!is_array($info)) {
    $info = array();
}

$badge         = isset($info['badge']) ? (string) $info['badge'] : '';
$title         = isset($info['title']) ? (string) $info['title'] : '';
$subtitle      = isset($info['subtitle']) ? (string) $info['subtitle'] : '';
$info_heading  = isset($info['info_heading']) ? (string) $info['info_heading'] : '';
$charity_line  = isset($info['charity_line']) ? (string) $info['charity_line'] : '';
$trustees_line = isset($info['trustees_line']) ? (string) $info['trustees_line'] : '';
$phone         = isset($info['phone']) ? (string) $info['phone'] : '';
$email         = isset($info['email']) ? (string) $info['email'] : '';
$address       = isset($info['address']) ? (string) $info['address'] : '';
$form_title    = isset($info['form_title']) ? (string) $info['form_title'] : '';
$form_intro    = isset($info['form_intro']) ? (string) $info['form_intro'] : '';
$social_label  = isset($info['social_label']) ? (string) $info['social_label'] : '';
$social_links  = (!empty($info['social_links']) && is_array($info['social_links'])) ? $info['social_links'] : array();

$icons = array(
    'phone'   => $uri . '/assets/images/contact-us/left-1.webp',
    'email'   => $uri . '/assets/images/contact-us/left-2.webp',
    'address' => $uri . '/assets/images/contact-us/left-3.webp',
);

$social_svgs = array(
    'facebook'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
    'instagram' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
    'youtube'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186 31.247 31.247 0 0 0 0 12.017a31.25 31.25 0 0 0 .502 5.831 3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136A31.25 31.25 0 0 0 24 12.017a31.247 31.247 0 0 0-.502-5.831zM9.545 15.568V8.466l6.273 3.551-6.273 3.551z"/></svg>',
    'x'         => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.727-8.829L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
    'tiktok'    => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.16 15.3a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.7a8.2 8.2 0 0 0 4.76 1.52V6.8a4.85 4.85 0 0 1-1.01-.11z"/></svg>',
    'linkedin'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
);

$social_labels = array(
    'facebook'  => __('Facebook', 'heros-on-the-water'),
    'instagram' => __('Instagram', 'heros-on-the-water'),
    'youtube'   => __('YouTube', 'heros-on-the-water'),
    'x'         => __('X', 'heros-on-the-water'),
    'tiktok'    => __('TikTok', 'heros-on-the-water'),
    'linkedin'  => __('LinkedIn', 'heros-on-the-water'),
);

$phone_href = $phone !== '' ? 'tel:' . preg_replace('/\s+/', '', $phone) : '';
$email_href = $email !== '' ? 'mailto:' . sanitize_email($email) : '';

$passed = (isset($args) && is_array($args)) ? $args : array();
$cf7    = isset($passed['cf7_shortcode']) ? trim((string) $passed['cf7_shortcode']) : '';
$has_cf7 = $cf7 !== '' && strpos($cf7, 'CONTACT_FORM_ID') === false && shortcode_exists('contact-form-7');
?>
<section class="hotw-block hotw-contact-v2" id="content-start" aria-labelledby="hotw-contact-title">
    <div class="container">
        <header class="hotw-contact-v2__head">
            <?php if ($badge !== '') : ?>
                <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="hotw-section-title hotw-contact-v2__title" id="hotw-contact-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($subtitle !== '') : ?>
                <p class="hotw-section-subtitle hotw-contact-v2__subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </header>

        <div class="hotw-contact-v2__grid">
            <div class="hotw-contact-v2__info">
                <?php if ($info_heading !== '') : ?>
                    <h3 class="hotw-contact-v2__info-title"><?php echo esc_html($info_heading); ?></h3>
                <?php endif; ?>
                <?php if ($charity_line !== '' || $trustees_line !== '') : ?>
                    <div class="hotw-contact-v2__meta">
                        <?php if ($charity_line !== '') : ?>
                            <p><?php echo esc_html($charity_line); ?></p>
                        <?php endif; ?>
                        <?php if ($trustees_line !== '') : ?>
                            <p><?php echo esc_html($trustees_line); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($phone !== '' || $email !== '' || $address !== '') : ?>
                    <div class="hotw-contact-v2__cards">
                        <?php if ($phone !== '') : ?>
                            <div class="hotw-contact-info-card">
                                <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['phone']); ?>" alt="" loading="lazy">
                                <div class="hotw-contact-info-card__body">
                                    <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Call Us Now', 'heros-on-the-water'); ?></h4>
                                    <a class="hotw-contact-info-card__value" href="<?php echo esc_url($phone_href); ?>"><?php echo esc_html($phone); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($email !== '') : ?>
                            <div class="hotw-contact-info-card">
                                <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['email']); ?>" alt="" loading="lazy">
                                <div class="hotw-contact-info-card__body">
                                    <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Email Us', 'heros-on-the-water'); ?></h4>
                                    <a class="hotw-contact-info-card__value" href="<?php echo esc_url($email_href); ?>"><?php echo esc_html($email); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($address !== '') : ?>
                            <div class="hotw-contact-info-card hotw-contact-info-card--wide">
                                <img class="hotw-contact-info-card__icon" src="<?php echo esc_url($icons['address']); ?>" alt="" loading="lazy">
                                <div class="hotw-contact-info-card__body">
                                    <h4 class="hotw-contact-info-card__label"><?php esc_html_e('Registered Address', 'heros-on-the-water'); ?></h4>
                                    <p class="hotw-contact-info-card__value"><?php echo esc_html($address); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($social_links) : ?>
                    <div class="hotw-contact-v2__social-row">
                        <?php if ($social_label !== '') : ?>
                            <p class="hotw-contact-v2__social-label"><?php echo esc_html($social_label); ?></p>
                        <?php endif; ?>
                        <div class="hotw-contact-v2__social">
                            <?php foreach ($social_links as $item) : ?>
                                <?php
                                if (!is_array($item)) {
                                    continue;
                                }
                                $network = isset($item['network']) ? (string) $item['network'] : '';
                                $url     = isset($item['url']) ? (string) $item['url'] : '';
                                if ($url === '' || !isset($social_svgs[$network])) {
                                    continue;
                                }
                                $label = isset($social_labels[$network]) ? $social_labels[$network] : $network;
                                ?>
                                <a
                                    class="hotw-contact-v2__social-link"
                                    href="<?php echo esc_url($url); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="<?php echo esc_attr($label); ?>"
                                >
                                    <?php echo $social_svgs[$network]; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hotw-contact-v2__panel">
                <?php if ($form_title !== '') : ?>
                    <h3 class="hotw-contact-v2__panel-title"><?php echo esc_html($form_title); ?></h3>
                <?php endif; ?>
                <?php if ($form_intro !== '') : ?>
                    <p class="hotw-contact-v2__panel-intro"><?php echo esc_html($form_intro); ?></p>
                <?php endif; ?>

                <div class="hotw-contact-v2__cf7">
                    <?php if ($has_cf7) : ?>
                        <?php echo do_shortcode($cf7); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CF7 shortcode HTML. ?>
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
