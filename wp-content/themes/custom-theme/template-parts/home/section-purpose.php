<?php
/**
 * Purpose & team section.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$p1 = hotw_placeholder_image(400, 400, 'hotw-p1');
$p2 = hotw_placeholder_image(400, 400, 'hotw-p2');
$p3 = hotw_placeholder_image(400, 400, 'hotw-p3');
$p4 = hotw_placeholder_image(400, 400, 'hotw-p4');
$team = hotw_placeholder_image(1200, 560, 'hotw-team');



?>



<?php
$about = get_field('about');
$image = $about['image'];
$image_bg = $about['image_bg'];
$sub_title = $about['sub_title'];
$title = $about['title'];
$content = $about['content'];
?>
<section class="hotw-section hotw-about hotw-section--cream" id="about">
    <div class="container">
        <header class="text-center mb-lg-5 mb-4 position-relative z-3">
            <p class="hotw-kicker"><?php echo $sub_title; ?></p>
            <h2 class="hotw-title"><?php echo $title; ?>

            </h2>
        </header>
        <div class="row justify-content-center mb-5 position-relative z-3">
            <div class="col-lg-6 text-center">
                <div class="hotw-prose hotw-prose--cream">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="about-bg">
            <img src="<?php echo $image_bg['url']; ?>" alt="" width="1891" height="693" loading="lazy"
                class="about-bg__img img-fluid">

            <span class="about-border border-1"></span>
            <span class="about-border border-2"></span>
            <span class="about-border border-3"></span>
            <span class="about-border border-4"></span>
        </div>



        <div class="hotw-team-photo">
            <img src="<?php echo $image['url']; ?>" alt="" width="1200" height="560" loading="lazy" class="img-fluid">
        </div>
    </div>
</section>