<?php
/**
 * CTA banner section.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$cta_bg = hotw_placeholder_image(1600, 600, 'hotw-cta-bg');
?>


<?php
$cta = get_field('cta', 10);
$image = $cta['image'];
$title = $cta['title'];
$content = $cta['content'];
$link = $cta['link'];
?>
<section class="hotw-cta-banner" id="order">
    <div class="container">
        <div class="cta-wap" style="background-image: url('<?php echo $image['url']; ?>');">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6 offset-lg-1">
                    <header class="text-right">
                        <h2 class="hotw-title"><?php echo $title; ?></h2>
                        <?php echo $content; ?>
                        <a class="blob-button" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    </header>
                </div>
            </div>
        </div>
    </div>
</section>