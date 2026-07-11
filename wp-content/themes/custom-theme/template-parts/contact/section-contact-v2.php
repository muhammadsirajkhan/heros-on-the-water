<?php
/**
 * Contact Us — info cards + message form.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$defaults = array(
    'badge'         => __('LET\'S TALK', 'heros-on-the-water'),
    'title'         => __('GET IN TOUCH', 'heros-on-the-water'),
    'subtitle'      => __('SUPPORT STARTS WITH A CONVERSATION.', 'heros-on-the-water'),
    'intro'         => __('Manx registered charity number: 1248. Reach us by phone, email, or the form — we are here for veterans, families, volunteers, and supporters.', 'heros-on-the-water'),
    'phone'         => '07624 336380',
    'email'         => 'heroesonthewateriom2026@outlook.com',
    'address'       => __('Port St Mary, Isle of Man', 'heros-on-the-water'),
    'cf7_shortcode' => '',
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-block--gray hotw-contact-v2" id="content-start" aria-labelledby="hotw-contact-title">
    <div class="container">
        <header class="hotw-section-head">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title" id="hotw-contact-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>

        <div class="hotw-contact-v2__grid">
            <div class="hotw-contact-v2__info">
                <h3 class="hotw-section-subtitle"><?php esc_html_e('CONTACT INFORMATION', 'heros-on-the-water'); ?></h3>
                <p class="hotw-prose"><?php echo esc_html($args['intro']); ?></p>

                <div class="hotw-contact-info-card">
                    <span class="hotw-contact-info-card__icon" aria-hidden="true">☎</span>
                    <div>
                        <h3><?php esc_html_e('Call Us Now', 'heros-on-the-water'); ?></h3>
                        <p><a href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $args['phone'])); ?>"><?php echo esc_html($args['phone']); ?></a></p>
                    </div>
                </div>
                <div class="hotw-contact-info-card">
                    <span class="hotw-contact-info-card__icon" aria-hidden="true">✉</span>
                    <div>
                        <h3><?php esc_html_e('Email Us', 'heros-on-the-water'); ?></h3>
                        <p><a href="<?php echo esc_url('mailto:' . $args['email']); ?>"><?php echo esc_html($args['email']); ?></a></p>
                    </div>
                </div>
                <div class="hotw-contact-info-card">
                    <span class="hotw-contact-info-card__icon" aria-hidden="true">📍</span>
                    <div>
                        <h3><?php esc_html_e('Registered Address', 'heros-on-the-water'); ?></h3>
                        <p><?php echo esc_html($args['address']); ?></p>
                    </div>
                </div>

                <p class="hotw-section-subtitle"><?php esc_html_e('Stay Social With us:', 'heros-on-the-water'); ?></p>
                <div class="hotw-contact-social">
                    <a href="#" aria-label="<?php esc_attr_e('Facebook', 'heros-on-the-water'); ?>">FB</a>
                    <a href="#" aria-label="<?php esc_attr_e('Instagram', 'heros-on-the-water'); ?>">IG</a>
                    <a href="#" aria-label="<?php esc_attr_e('YouTube', 'heros-on-the-water'); ?>">YT</a>
                    <a href="#" aria-label="<?php esc_attr_e('X', 'heros-on-the-water'); ?>">X</a>
                    <a href="#" aria-label="<?php esc_attr_e('TikTok', 'heros-on-the-water'); ?>">TT</a>
                    <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'heros-on-the-water'); ?>">IN</a>
                </div>
            </div>

            <div class="hotw-contact-form-card">
                <h3><?php esc_html_e('SEND US A MESSAGE', 'heros-on-the-water'); ?></h3>
                <p><?php esc_html_e('Fill in the form and we will get back to you as soon as we can.', 'heros-on-the-water'); ?></p>

                <?php if (!empty($args['cf7_shortcode'])) : ?>
                    <?php echo do_shortcode($args['cf7_shortcode']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php else : ?>
                    <form class="hotw-static-contact-form" action="#" method="post" onsubmit="return false;">
                        <div class="hotw-field">
                            <label for="hotw-contact-name"><?php esc_html_e('Your Name*', 'heros-on-the-water'); ?></label>
                            <input type="text" id="hotw-contact-name" name="name" required>
                        </div>
                        <div class="hotw-field">
                            <label for="hotw-contact-email"><?php esc_html_e('Your Email Address*', 'heros-on-the-water'); ?></label>
                            <input type="email" id="hotw-contact-email" name="email" required>
                        </div>
                        <div class="hotw-field">
                            <label for="hotw-contact-message"><?php esc_html_e('Enter your Message*', 'heros-on-the-water'); ?></label>
                            <textarea id="hotw-contact-message" name="message" required></textarea>
                        </div>
                        <label class="hotw-field">
                            <input type="checkbox" name="privacy" required>
                            <?php esc_html_e('I agree to the Terms & Privacy Policy', 'heros-on-the-water'); ?>
                        </label>
                        <button type="submit" class="hotw-btn hotw-btn--yellow"><?php esc_html_e('Submit', 'heros-on-the-water'); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
