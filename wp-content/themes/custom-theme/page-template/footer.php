<?php
/**
 * Shared site footer and closing HTML (navy/yellow design).
 *
 * ACF options: footer_brand, footer_columns, footer_newsletter,
 * footer_contact, footer_legal (see acf-json/group_hotw_footer.json).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$brand = function_exists('get_field') ? get_field('footer_brand', 'option') : null;
if (!is_array($brand)) {
    $brand = array();
}

$columns = function_exists('get_field') ? get_field('footer_columns', 'option') : null;
if (!is_array($columns)) {
    $columns = array();
}

$newsletter = function_exists('get_field') ? get_field('footer_newsletter', 'option') : null;
if (!is_array($newsletter)) {
    $newsletter = array();
}

$contact = function_exists('get_field') ? get_field('footer_contact', 'option') : null;
if (!is_array($contact)) {
    $contact = array();
}

$legal = function_exists('get_field') ? get_field('footer_legal', 'option') : null;
if (!is_array($legal)) {
    $legal = array();
}

$logo         = (isset($brand['logo']) && is_array($brand['logo'])) ? $brand['logo'] : null;
$mission      = isset($brand['mission']) ? (string) $brand['mission'] : '';
$social_links = (!empty($brand['social_links']) && is_array($brand['social_links'])) ? $brand['social_links'] : array();

$logo_url = (!empty($logo['url'])) ? $logo['url'] : '';
$logo_alt = (!empty($logo['alt'])) ? $logo['alt'] : get_bloginfo('name');

$nl_heading     = isset($newsletter['heading']) ? (string) $newsletter['heading'] : '';
$nl_text        = isset($newsletter['text']) ? (string) $newsletter['text'] : '';
$nl_placeholder = isset($newsletter['email_placeholder']) ? (string) $newsletter['email_placeholder'] : '';
$nl_shortcode   = isset($newsletter['form_shortcode']) ? trim((string) $newsletter['form_shortcode']) : '';
$has_nl_form    = $nl_shortcode !== '' && shortcode_exists('contact-form-7');

$phone = isset($contact['phone']) ? (string) $contact['phone'] : '';
$email = isset($contact['email']) ? (string) $contact['email'] : '';

$copyright    = isset($legal['copyright']) ? (string) $legal['copyright'] : '';
$privacy_text = isset($legal['privacy_text']) ? (string) $legal['privacy_text'] : '';
$privacy_url  = isset($legal['privacy_url']) ? (string) $legal['privacy_url'] : '';
$terms_text   = isset($legal['terms_text']) ? (string) $legal['terms_text'] : '';
$terms_url    = isset($legal['terms_url']) ? (string) $legal['terms_url'] : '';
$has_privacy  = ($privacy_url !== '' && $privacy_text !== '');
$has_terms    = ($terms_url !== '' && $terms_text !== '');

if ($copyright !== '') {
    $copyright = str_replace('{year}', gmdate('Y'), $copyright);
}

$show_newsletter = ($nl_heading !== '' || $nl_text !== '' || $has_nl_form || $nl_placeholder !== '');
?>

<footer class="hotw-site-footer" role="contentinfo">
    <div class="container">
        <div class="hotw-site-footer__grid">
            <div class="hotw-site-footer__brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hotw-site-footer__logo-link">
                    <?php if ($logo_url !== '') : ?>
                        <img
                            src="<?php echo esc_url($logo_url); ?>"
                            alt="<?php echo esc_attr($logo_alt); ?>"
                            class="hotw-site-footer__logo"
                        >
                    <?php else : ?>
                        <span class="hotw-site-footer__logo-text"><?php echo esc_html(get_bloginfo('name')); ?></span>
                    <?php endif; ?>
                </a>
                <?php if ($mission !== '') : ?>
                    <p class="hotw-site-footer__mission"><?php echo esc_html($mission); ?></p>
                <?php endif; ?>
                <?php if ($social_links) : ?>
                    <div class="hotw-site-footer__social">
                        <?php foreach ($social_links as $item) : ?>
                            <?php
                            if (!is_array($item)) {
                                continue;
                            }
                            $network = isset($item['network']) ? (string) $item['network'] : '';
                            $url     = isset($item['url']) ? (string) $item['url'] : '';
                            if ($url === '' || $network === '') {
                                continue;
                            }
                            ?>
                            <a
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
            </div>

            <?php foreach ($columns as $column) : ?>
                <?php
                if (!is_array($column)) {
                    continue;
                }
                $col_heading = isset($column['heading']) ? (string) $column['heading'] : '';
                $col_links   = (!empty($column['links']) && is_array($column['links'])) ? $column['links'] : array();
                if ($col_heading === '' && !$col_links) {
                    continue;
                }
                ?>
                <div class="hotw-site-footer__col">
                    <?php if ($col_heading !== '') : ?>
                        <h3 class="hotw-site-footer__heading"><?php echo esc_html($col_heading); ?></h3>
                    <?php endif; ?>
                    <?php if ($col_links) : ?>
                        <ul class="hotw-site-footer__links">
                            <?php foreach ($col_links as $row) : ?>
                                <?php
                                if (!is_array($row)) {
                                    continue;
                                }
                                $link_text = isset($row['text']) ? (string) $row['text'] : '';
                                $link_url  = isset($row['url']) ? (string) $row['url'] : '';
                                if ($link_url === '' || $link_text === '') {
                                    continue;
                                }
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($link_url); ?>">
                                        <?php echo esc_html($link_text); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <?php if ($show_newsletter) : ?>
                <div class="hotw-site-footer__col hotw-site-footer__newsletter">
                    <?php if ($nl_heading !== '') : ?>
                        <h3 class="hotw-site-footer__heading"><?php echo esc_html($nl_heading); ?></h3>
                    <?php endif; ?>
                    <?php if ($nl_text !== '') : ?>
                        <p class="hotw-site-footer__newsletter-text"><?php echo esc_html($nl_text); ?></p>
                    <?php endif; ?>
                    <?php if ($has_nl_form) : ?>
                        <div class="hotw-newsletter-form hotw-newsletter-form--cf7">
                            <?php echo do_shortcode($nl_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CF7 shortcode HTML. ?>
                        </div>
                    <?php else : ?>
                        <form class="hotw-newsletter-form" action="#" method="post" onsubmit="return false;">
                            <label class="screen-reader-text" for="hotw-newsletter-email"><?php echo esc_html($nl_placeholder !== '' ? $nl_placeholder : __('Email', 'heros-on-the-water')); ?></label>
                            <div class="hotw-newsletter-form__row">
                                <span class="hotw-newsletter-form__icon" aria-hidden="true">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </span>
                                <input type="email" id="hotw-newsletter-email" name="email" placeholder="<?php echo esc_attr($nl_placeholder); ?>" required>
                                <button type="submit" class="hotw-newsletter-form__btn" aria-label="<?php esc_attr_e('Subscribe', 'heros-on-the-water'); ?>">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($phone !== '' || $email !== '') : ?>
            <div class="hotw-site-footer__contact-strip">
                <?php if ($phone !== '') : ?>
                    <a class="hotw-site-footer__contact-item" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                        <span class="hotw-site-footer__contact-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </span>
                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                <?php endif; ?>
                <?php if ($email !== '') : ?>
                    <a class="hotw-site-footer__contact-item" href="<?php echo esc_url('mailto:' . $email); ?>">
                        <span class="hotw-site-footer__contact-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <span><?php echo esc_html($email); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($copyright !== '' || $has_privacy || $has_terms) : ?>
            <div class="hotw-site-footer__legal">
                <?php if ($copyright !== '') : ?>
                    <p class="hotw-site-footer__copy"><?php echo esc_html($copyright); ?></p>
                <?php endif; ?>
                <?php if ($has_privacy || $has_terms) : ?>
                    <p class="hotw-site-footer__policies">
                        <?php if ($has_privacy) : ?>
                            <a href="<?php echo esc_url($privacy_url); ?>"><?php echo esc_html($privacy_text); ?></a>
                        <?php endif; ?>
                        <?php if ($has_privacy && $has_terms) : ?>
                            <span aria-hidden="true"> • </span>
                        <?php endif; ?>
                        <?php if ($has_terms) : ?>
                            <a href="<?php echo esc_url($terms_url); ?>"><?php echo esc_html($terms_text); ?></a>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
