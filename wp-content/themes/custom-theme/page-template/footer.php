<?php
/**
 * Shared site footer and closing HTML (navy/yellow design).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$hotw_uri = get_template_directory_uri();
$phone    = '07624 247667';
$email    = 'heroesonthewateriom2026@outlook.com';
$logo_src = $hotw_uri . '/assets/images/home/footer-logo.webp';
?>

<footer class="hotw-site-footer" role="contentinfo">
    <div class="container">
        <div class="hotw-site-footer__grid">
            <div class="hotw-site-footer__brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hotw-site-footer__logo-link">
                    <img
                        src="<?php echo esc_url($logo_src); ?>"
                        alt="<?php esc_attr_e('Heroes on the Water', 'heros-on-the-water'); ?>"
                        class="hotw-site-footer__logo"
                        
                    >
                </a>
                <p class="hotw-site-footer__mission">
                    <?php esc_html_e('Heroes On The Water provides kayaking & fishing experiences that help veterans reconnect.', 'heros-on-the-water'); ?>
                </p>
                <div class="hotw-site-footer__social">
                    <a href="#" aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="#" aria-label="<?php esc_attr_e('Instagram', 'heros-on-the-water'); ?>">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="#" aria-label="<?php esc_attr_e('X', 'heros-on-the-water'); ?>">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.727-8.829L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" aria-label="<?php esc_attr_e('YouTube', 'heros-on-the-water'); ?>">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon fill="#000b26" points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                    </a>
                </div>
            </div>

            <div class="hotw-site-footer__col">
                <h3 class="hotw-site-footer__heading"><?php esc_html_e('Useful Links', 'heros-on-the-water'); ?></h3>
                <ul class="hotw-site-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/events/')); ?>"><?php esc_html_e('Events', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/donate/')); ?>"><?php esc_html_e('Donate', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/partners/')); ?>"><?php esc_html_e('Supporters & Partners', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact', 'heros-on-the-water'); ?></a></li>
                </ul>
            </div>

            <div class="hotw-site-footer__col">
                <h3 class="hotw-site-footer__heading"><?php esc_html_e('Get Involved', 'heros-on-the-water'); ?></h3>
                <ul class="hotw-site-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/donate/')); ?>"><?php esc_html_e('Fundraising Opportunities', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/events/')); ?>"><?php esc_html_e('Upcoming Events', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/donate/')); ?>"><?php esc_html_e('Fundraising Opportunity', 'heros-on-the-water'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/events/')); ?>"><?php esc_html_e('Upcoming Events', 'heros-on-the-water'); ?></a></li>
                </ul>
            </div>

            <div class="hotw-site-footer__col">
                <h3 class="hotw-site-footer__heading"><?php esc_html_e('Connect', 'heros-on-the-water'); ?></h3>
                <ul class="hotw-site-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'heros-on-the-water'); ?></a></li>
                </ul>
            </div>

            <div class="hotw-site-footer__col hotw-site-footer__newsletter">
                <h3 class="hotw-site-footer__heading"><?php esc_html_e('Newsletter', 'heros-on-the-water'); ?></h3>
                <p class="hotw-site-footer__newsletter-text">
                    <?php esc_html_e('Become a HOTW Insider! Add impact to your inbox. Get our emails to stay in the know.', 'heros-on-the-water'); ?>
                </p>
                <form class="hotw-newsletter-form" action="#" method="post" onsubmit="return false;">
                    <label class="screen-reader-text" for="hotw-newsletter-email"><?php esc_html_e('Email Address', 'heros-on-the-water'); ?></label>
                    <div class="hotw-newsletter-form__row">
                        <span class="hotw-newsletter-form__icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <input type="email" id="hotw-newsletter-email" name="email" placeholder="<?php esc_attr_e('Email Address', 'heros-on-the-water'); ?>" required>
                        <button type="submit" class="hotw-newsletter-form__btn" aria-label="<?php esc_attr_e('Subscribe', 'heros-on-the-water'); ?>">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hotw-site-footer__contact-strip">
            <a class="hotw-site-footer__contact-item" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                <span class="hotw-site-footer__contact-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </span>
                <span><?php echo esc_html($phone); ?></span>
            </a>
            <a class="hotw-site-footer__contact-item" href="<?php echo esc_url('mailto:' . $email); ?>">
                <span class="hotw-site-footer__contact-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <span><?php echo esc_html($email); ?></span>
            </a>
        </div>

        <div class="hotw-site-footer__legal">
            <p class="hotw-site-footer__copy">
                <?php echo esc_html(sprintf(__('© %s Heroes On The Water. All Rights Reserved.', 'heros-on-the-water'), gmdate('Y'))); ?>
            </p>
            <p class="hotw-site-footer__policies">
                <a href="#"><?php esc_html_e('Privacy Policy', 'heros-on-the-water'); ?></a>
                <span aria-hidden="true"> • </span>
                <a href="#"><?php esc_html_e('Terms & Conditions', 'heros-on-the-water'); ?></a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
