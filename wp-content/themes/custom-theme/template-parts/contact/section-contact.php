<?php
/**
 * Contact page: intro, details grid, social, map, CF7 form card.
 *
 * Pass `cf7_shortcode` from contact-page.php (from WP: Contact → Contact Forms → copy shortcode).
 * Optional wrapper: array( 'contact_defaults' => array(...) ).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$t_uri = get_template_directory_uri();

$contact_default_args = array(
    'section_id'          => 'contact-main',
    'section_class'       => 'hotw-section hotw-section--cream hotw-contact',
    'eyebrow'             => __('Heroes on the Water', 'heros-on-the-water'),
    'title'               => __('Get In Touch With Black', 'heros-on-the-water'),
    'title_script'        => __('Dog Oven', 'heros-on-the-water'),
    'intro'               => __('Planning a visit, a private event, or just want to say hello? Drop us a line — we read every message and usually reply within one business day.', 'heros-on-the-water'),
    'details_heading'     => __('Contact details:', 'heros-on-the-water'),
    'details'             => array(
        array(
            'label'   => __('Call us now', 'heros-on-the-water'),
            'value'   => '+44 7624 230209',
            'href'    => 'tel:+447624230209',
            'icon'    => 'phone',
            'variant' => 'red',
        ),
        array(
            'label'   => __('Address', 'heros-on-the-water'),
            'value'   => 'E Quay, Peel, Isle of Man IM5 1AR, Isle of Man',
            'href'    => 'https://maps.google.com/?q=E+Quay+Peel+Isle+of+Man',
            'icon'    => 'location',
            'variant' => 'orange',
        ),
        array(
            'label'   => __('Email us on', 'heros-on-the-water'),
            'value'   => 'Info@BDO.com',
            'href'    => 'mailto:Info@BDO.com',
            'icon'    => 'mail',
            'variant' => 'red',
        ),
        array(
            'label'   => __('Timing', 'heros-on-the-water'),
            'value'   => __('08:00 AM - to - 06:00 PM', 'heros-on-the-water'),
            'href'    => '',
            'icon'    => 'clock',
            'variant' => 'orange',
        ),
    ),
    'social_heading'      => __('Follow us on:', 'heros-on-the-water'),
    'social_links'        => array(
        array(
            'label' => __('Facebook', 'heros-on-the-water'),
            'url'   => 'https://www.facebook.com/',
            'img'   => $t_uri . '/assets/images/fb.png',
        ),
        array(
            'label' => __('Instagram', 'heros-on-the-water'),
            'url'   => 'https://www.instagram.com/',
            'img'   => $t_uri . '/assets/images/insta.png',
        ),
        array(
            'label' => __('YouTube', 'heros-on-the-water'),
            'url'   => 'https://www.youtube.com/',
            'img'   => $t_uri . '/assets/images/youtube.png',
        ),
    ),
    'map_heading'         => __('Location in map:', 'heros-on-the-water'),
    'map_image'           => $t_uri . '/assets/images/third-1.png',
    'map_image_alt'       => __('Map showing Heroes on the Water location', 'heros-on-the-water'),
    'map_link'            => 'https://maps.google.com/?q=E+Quay+Peel+Isle+of+Man+IM5+1AR',
    'form_eyebrow'        => __('Heroes on the Water', 'heros-on-the-water'),
    'form_title'          => __('Fill your details', 'heros-on-the-water'),
    'logo_src'            => $t_uri . '/assets/images/header-logo.png',
    'logo_alt'            => __('Heroes on the Water', 'heros-on-the-water'),
    'cf7_shortcode'       => '[contact-form-7 id="71bce2e" title="Contact form Page" html_class="hotw-cf7"]',
);

$passed = array();
if (isset($args) && is_array($args)) {
    if (!empty($args['contact_defaults']) && is_array($args['contact_defaults'])) {
        $passed = $args['contact_defaults'];
    } else {
        $passed = $args;
        unset($passed['contact_defaults']);
    }
}

$c = wp_parse_args($passed, $contact_default_args);
if (isset($passed['details']) && is_array($passed['details'])) {
    $c['details'] = $passed['details'];
}
if (isset($passed['social_links']) && is_array($passed['social_links'])) {
    $c['social_links'] = $passed['social_links'];
}

$icon_svgs = array(
    'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
    'location' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
);
?>
<section class="<?php echo esc_attr($c['section_class']); ?>" id="<?php echo esc_attr($c['section_id']); ?>"
    aria-labelledby="<?php echo esc_attr($c['section_id']); ?>-title">
    <div class="container py-lg-2">
        <header class="hotw-contact__head text-center mx-auto mb-4 mb-lg-5">
            <p class="hotw-contact__eyebrow"><?php echo esc_html($c['eyebrow']); ?></p>
            <h1 class="hotw-title hotw-contact__title mb-0" id="<?php echo esc_attr($c['section_id']); ?>-title">
                <?php echo esc_html($c['title']); ?>
            </h1>
            <span class="hotw-script hotw-contact__script" aria-hidden="true"><?php echo esc_html($c['title_script']); ?></span>
            <div class="hotw-prose hotw-contact__intro mx-auto mt-4">
                <p><?php echo esc_html($c['intro']); ?></p>
            </div>
        </header>

        <div class="row justify-content-between g-4 g-lg-5 align-items-start">
            <div class="col-lg-6">
                <div class="hotw-contact-aside">
                    <section class="hotw-contact-block" aria-labelledby="<?php echo esc_attr($c['section_id']); ?>-details-h">
                        <h2 class="hotw-contact-block__title" id="<?php echo esc_attr($c['section_id']); ?>-details-h">
                            <?php echo esc_html($c['details_heading']); ?>
                        </h2>
                        <ul class="hotw-contact-details list-unstyled mb-0">
                            <?php foreach ($c['details'] as $row) : ?>
                                <?php
                                $icon = isset($row['icon']) ? (string) $row['icon'] : 'phone';
                                $svg  = $icon_svgs[$icon] ?? $icon_svgs['phone'];
                                $var  = isset($row['variant']) && $row['variant'] === 'orange' ? 'orange' : 'red';
                                $href = isset($row['href']) ? (string) $row['href'] : '';
                                $tag  = $href !== '' ? 'a' : 'div';
                                ?>
                                <li class="hotw-contact-details__item">
                                    <?php if ($tag === 'a') : ?>
                                        <a class="hotw-contact-details__link" href="<?php echo esc_url($href); ?>"
                                            <?php echo preg_match('#^https?://#i', $href) ? 'rel="noopener noreferrer" target="_blank"' : ''; ?>>
                                            <span class="hotw-contact-details__icon hotw-contact-details__icon--<?php echo esc_attr($var); ?>"
                                                aria-hidden="true"><?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG icons. ?></span>
                                            <span class="hotw-contact-details__body">
                                                <span class="hotw-contact-details__label"><?php echo esc_html($row['label'] ?? ''); ?></span>
                                                <span class="hotw-contact-details__value"><?php echo esc_html($row['value'] ?? ''); ?></span>
                                            </span>
                                        </a>
                                    <?php else : ?>
                                        <div class="hotw-contact-details__link">
                                            <span class="hotw-contact-details__icon hotw-contact-details__icon--<?php echo esc_attr($var); ?>"
                                                aria-hidden="true"><?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG icons. ?></span>
                                            <span class="hotw-contact-details__body">
                                                <span class="hotw-contact-details__label"><?php echo esc_html($row['label'] ?? ''); ?></span>
                                                <span class="hotw-contact-details__value"><?php echo esc_html($row['value'] ?? ''); ?></span>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="hotw-contact-block" aria-labelledby="<?php echo esc_attr($c['section_id']); ?>-social-h">
                        <h2 class="hotw-contact-block__title" id="<?php echo esc_attr($c['section_id']); ?>-social-h">
                            <?php echo esc_html($c['social_heading']); ?>
                        </h2>
                        <ul class="hotw-contact-social list-unstyled d-flex flex-wrap gap-3 mb-0">
                            <?php foreach ($c['social_links'] as $soc) : ?>
                                <li>
                                    <a class="hotw-contact-social__link" href="<?php echo esc_url($soc['url'] ?? '#'); ?>"
                                        rel="noopener noreferrer" target="_blank">
                                        <span class="hotw-contact-social__img-wrap">
                                            <img src="<?php echo esc_url($soc['img'] ?? ''); ?>"
                                                alt="" width="40" height="40" loading="lazy" decoding="async">
                                        </span>
                                        <span class="hotw-contact-social__label"><?php echo esc_html($soc['label'] ?? ''); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="hotw-contact-block hotw-contact-block--last" aria-labelledby="<?php echo esc_attr($c['section_id']); ?>-map-h">
                        <h2 class="hotw-contact-block__title" id="<?php echo esc_attr($c['section_id']); ?>-map-h">
                            <?php echo esc_html($c['map_heading']); ?>
                        </h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2332.5416318543184!2d-4.697592900000001!3d54.2236021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48639364f5597bbf%3A0xbe2069d935277901!2sBlack%20Dog%20Oven!5e0!3m2!1sen!2s!4v1777360960863!5m2!1sen!2s" width="100%" height="264" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                </div>
            </div>

            <div class="col-lg-5 col-12">
                <div class="hotw-contact-form-card"style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/form-background.png');">
                    <div class="hotw-contact-form-card__cap" aria-hidden="true"></div>
                    <div class="hotw-contact-form-card__logo-wrap">
                        <img class="hotw-contact-form-card__logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/form-logo.png"
                            alt="<?php echo esc_attr($c['logo_alt']); ?>" width="96" height="96" loading="lazy" decoding="async">
                    </div>
                    <div class="hotw-contact-form-card__inner">
                        <h2 class="hotw-contact-form-card__title"><?php echo esc_html($c['form_title']); ?></h2>
                        <p class="hotw-contact-form-card__eyebrow"><?php echo esc_html($c['form_eyebrow']); ?></p>

                        <div class="hotw-contact-form-card__cf7">
                            <?php
                            $cf7_shortcode = ! empty($c['cf7_shortcode'])
                                ? (string) $c['cf7_shortcode']
                                : '[contact-form-7 id="71bce2e" title="Contact form Page" html_class="hotw-cf7"]';
                            echo do_shortcode($cf7_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CF7 shortcode.
                            ?>
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
