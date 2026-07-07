<?php
/**
 * Gallery section.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

$gallery_src = static function ($n) {
    return oven_gallery_image_url((int) $n);
};

$slots = array(
    array('n' => 1, 'class' => '', 'w' => 560, 'h' => 840),
    array('n' => 2, 'class' => '--g2', 'w' => 560, 'h' => 420),
    array('n' => 3, 'class' => '--g12', 'w' => 640, 'h' => 360),
    array('n' => 4, 'class' => '--g11', 'w' => 640, 'h' => 420),
    array('n' => 5, 'class' => '--g5', 'w' => 480, 'h' => 720),
    array('n' => 6, 'class' => '--g6', 'w' => 400, 'h' => 400),
    array('n' => 7, 'class' => '--g7', 'w' => 400, 'h' => 400),
    array('n' => 8, 'class' => '--g8', 'w' => 640, 'h' => 360),
    array('n' => 9, 'class' => '--g9', 'w' => 640, 'h' => 480),
    array('n' => 10, 'class' => '--g10', 'w' => 640, 'h' => 360),
    array('n' => 11, 'class' => '--g4', 'w' => 400, 'h' => 400),
    array('n' => 12, 'class' => '--g3', 'w' => 400, 'h' => 400),
    array('n' => 13, 'class' => '--g1', 'w' => 640, 'h' => 640),
);
?>

<?php
$gallery = get_field('gallery', 10);
$sub_title = $gallery['sub_title'];
$title = $gallery['title'];
$content = $gallery['content'];
$facebook = $gallery['facebook'];
$image_1 = $gallery['image_1'];
?>
<section class="oven-section oven-section--white position-relative overflow-hidden" id="gallery">
    <div class="container oven-gallery-wrap">
        <header class="oven-gallery-head row justify-content-between  g-4 mb-4 mb-lg-5">
            <div class="col-lg-5">
                <p class="oven-kicker">
                    <?php echo $sub_title; ?>
                </p>
                <h2 class="oven-title oven-gallery-head__title">
                    <?php echo $title; ?>
                </h2>
            </div>
            <div class="col-lg-5 oven-gallery-head__aside">
                <div class="oven-prose oven-gallery-head__copy mb-3 mb-lg-4">
                    <?php echo $content; ?>
                </div>
                <a class="blob-button oven-btn-facebook" href="<?php echo $facebook['url']; ?>"
                    rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"
                        width="18" height="18">
                        <path
                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2v-2.5c0-1.93 1.57-3.5 3.5-3.5H16v3h-2c-.55 0-1 .45-1 1V12h3l-.5 3H15v6.95c5.05-.5 9-4.76 9-9.95z" />
                    </svg>
                    <span><?php echo $facebook['title']; ?></span>
                </a>
            </div>
        </header>
    </div>
    <div class="container-fluid position-relative">
        <div class="oven-gallery-deco" aria-hidden="true"><?php esc_html_e('Our Gallery', 'the-black-door-oven'); ?>
        </div>

        <div class="items-gallery">
            <div class="item-1">
                <div class="image image-1">
                    <img src="<?php echo $gallery['image_1']['url']; ?>" alt="">
                    <img src="<?php echo $gallery['image_2']['url']; ?>" alt="">
                </div>
                <div class="image image-2">
                    <img src="<?php echo $gallery['image_3']['url']; ?>" alt="">
                    <img src="<?php echo $gallery['image_4']['url']; ?>" alt="">
                </div>
            </div>
            <div class="item-2">
                <div class="image image-1">
                    <img src="<?php echo $gallery['image_5']['url']; ?>" alt="">
                </div>
                <div class="image image-2">
                    <img src="<?php echo $gallery['image_6']['url']; ?>" alt="">
                    <img src="<?php echo $gallery['image_7']['url']; ?>" alt="">
                </div>
            </div>
            <div class="item-3">
                <div class="image image-1">
                    <img src="<?php echo $gallery['image_8']['url']; ?>" alt="">
                    <img src="<?php echo $gallery['image_9']['url']; ?>" alt="">
                </div>
                <div class="image image-2">
                    <img src="<?php echo $gallery['image_10']['url']; ?>" alt="">
                    <div class="image image-3">
                        <div class="image image-4">
                            <img src="<?php echo $gallery['image_11']['url']; ?>" alt="">
                            <img src="<?php echo $gallery['image_12']['url']; ?>" alt="">
                        </div>
                        <img src="<?php echo $gallery['image_13']['url']; ?>" alt="">

                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="oven-gallery-mosaic py-2 py-lg-4" role="list">
            <?php foreach ($slots as $slot): ?>
                <div class="oven-gallery-item <?php echo esc_attr($slot['class']); ?>" role="listitem">
                    <img
                        src="<?php echo esc_url($gallery_src($slot['n'])); ?>"
                        alt="<?php echo esc_attr(sprintf(__('Gallery photo %d', 'the-black-door-oven'), (int) $slot['n'])); ?>"
                        width="<?php echo (int) $slot['w']; ?>"
                        height="<?php echo (int) $slot['h']; ?>"
                        loading="lazy"
                        decoding="async">
                </div>
            <?php endforeach; ?>
        </div> -->

        <!-- <div class="swiper oven-gallery-swiper oven-gallery-swiper-root py-4" aria-label="<?php esc_attr_e('Gallery', 'the-black-door-oven'); ?>">
            <div class="swiper-wrapper">
                <?php foreach ($slots as $slot): ?>
                    <div class="swiper-slide">
                        <img
                            src="<?php echo esc_url($gallery_src($slot['n'])); ?>"
                            alt="<?php echo esc_attr(sprintf(__('Gallery photo %d', 'the-black-door-oven'), (int) $slot['n'])); ?>"
                            width="<?php echo (int) $slot['w']; ?>"
                            height="<?php echo (int) $slot['h']; ?>"
                            loading="lazy"
                            decoding="async">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div> -->
    </div>
</section>