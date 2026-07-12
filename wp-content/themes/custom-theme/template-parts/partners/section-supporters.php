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
$img = $uri . '/assets/images/partners';

$defaults = array(
    'badge'    => __('HEROES ON THE WATER', 'heros-on-the-water'),
    'title'    => __('OUR SUPPORTERS', 'heros-on-the-water'),
    'subtitle' => __('SOME OF THE WONDERFUL COMPANIES WHO\'VE HELPED US ON OUR JOURNEY', 'heros-on-the-water'),
    'caption'  => __('OUR SUPPORTERS', 'heros-on-the-water'),
    'logos'    => array(
        array('src' => $img . '/s1.webp', 'alt' => __('SLMC Consulting', 'heros-on-the-water')),
        array('src' => $img . '/s2.webp', 'alt' => __('HSS Hire', 'heros-on-the-water')),
        array('src' => $img . '/s3.webp', 'alt' => __('Manx Lottery Trust', 'heros-on-the-water')),
        array('src' => $img . '/s4.webp', 'alt' => __('Isle of Man coat of arms', 'heros-on-the-water')),
        array('src' => $img . '/s5.webp', 'alt' => __('5iFTH Dimension German Kitchens', 'heros-on-the-water')),
        array('src' => $img . '/s6.webp', 'alt' => __('Tower Insurance', 'heros-on-the-water')),
        array('src' => $img . '/s7.webp', 'alt' => __('The Stars Group', 'heros-on-the-water')),
        array('src' => $img . '/s8.webp', 'alt' => __('Venetian Plaster Company', 'heros-on-the-water')),
        array('src' => $img . '/s9.webp', 'alt' => __('Marks & Spencer', 'heros-on-the-water')),
        array('src' => $img . '/s10.webp', 'alt' => __('Microgaming', 'heros-on-the-water')),
        array('src' => $img . '/s11.webp', 'alt' => __('University College Isle of Man', 'heros-on-the-water')),
        array('src' => $img . '/s12.webp', 'alt' => __('Laser Mayhem', 'heros-on-the-water')),
    ),
);

$args = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;
?>
<section class="hotw-block hotw-supporters" id="content-start" aria-labelledby="hotw-supporters-title">
    <div class="container">
        <header class="hotw-section-head hotw-section-head--center">
            <span class="hotw-badge hotw-badge--blue"><?php echo esc_html($args['badge']); ?></span>
            <h2 class="hotw-section-title hotw-supporters__title" id="hotw-supporters-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="hotw-section-subtitle hotw-supporters__subtitle"><?php echo esc_html($args['subtitle']); ?></p>
        </header>

        <div class="hotw-logo-wall">
            <span class="hotw-logo-wall__caption"><?php echo esc_html($args['caption']); ?></span>
            <ul class="hotw-logo-wall__grid">
                <?php foreach ($args['logos'] as $logo) : ?>
                    <?php
                    if (is_string($logo)) {
                        $logo = array(
                            'src' => $logo,
                            'alt' => '',
                        );
                    }
                    $src = isset($logo['src']) ? $logo['src'] : '';
                    $alt = isset($logo['alt']) ? $logo['alt'] : '';
                    if ($src === '') {
                        continue;
                    }
                    ?>
                    <li class="hotw-logo-wall__item">
                        <img
                            src="<?php echo esc_url($src); ?>"
                            alt="<?php echo esc_attr($alt); ?>"
                            width="211"
                            height="211"
                            loading="lazy"
                        >
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
