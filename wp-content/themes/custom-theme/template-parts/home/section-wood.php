<?php
/**
 * Wood-fired feature section.
 *
 * Configurable via get_template_part() third argument ($args).
 * Optional wrapper: array( 'wood_defaults' => $your_array ).
 *
 * @package The_Black_Door_Oven
 *
 * @example Default (home):
 *   get_template_part( 'template-parts/home/section', 'wood' );
 *
 * @example Overrides:
 *   get_template_part( 'template-parts/home/section', 'wood', $wood_args );
 */

if (!defined('ABSPATH')) {
    exit;
}

$wood_default_args = array(
    'section_id' => 'menu',
    'section_class' => 'oven-section oven-wood-board',
    'bg_image' => get_template_directory_uri() . '/assets/images/third-1.png',
    'title' => __('Authentic Wood Fired', 'the-black-door-oven'),
    'title_strong' => __('Pizza', 'the-black-door-oven'),
    'description' => __('We burn hardwood to a clean, steady heat so the crust chars in all the right places — blistered, elastic, and fragrant. San Marzano tomatoes, fior di latte, and a drizzle of olive oil finish the story.', 'the-black-door-oven'),
);

$passed = array();
if (isset($args) && is_array($args)) {
    if (!empty($args['wood_defaults']) && is_array($args['wood_defaults'])) {
        $passed = $args['wood_defaults'];
    } else {
        $passed = $args;
        unset($passed['wood_defaults']);
    }
}

$wood = wp_parse_args($passed, $wood_default_args);
$wood['title_strong'] = isset($wood['title_strong']) ? (string) $wood['title_strong'] : '';




?>


<?php
$sub_banner = get_field('sub_banner');
// echo 321;
// print_r($sub_banner);
if(!$sub_banner) {
$sub_banner = get_field('sub_banner_copy');
// echo 123;
}
$image_bg = $sub_banner['image_bg'];
$title = $sub_banner['title'];
$content = $sub_banner['content'];
$link = $sub_banner['link'];
?>
<section class="oven-section oven-wood-board" id="menu"
    style="background-image:url(<?php echo esc_url($image_bg['url']); ?>)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <!-- <div class="col-lg-6">
                <div class="oven-wood-img">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pizza.png'); ?>" alt="" width="900" height="700" loading="lazy">
                </div>
            </div> -->
            <div class="col-lg-7"></div>
            <div class="col-lg-4 col-md-6">
                <h2 class="oven-title oven-title--white mb-0">
                    <?php echo $title; ?>

                </h2>
                <div class="oven-prose oven-prose--on-dark mt-4">
                    <?php echo $content; ?>
                </div>
                <?php if ($link && !empty($link)): ?>
                    <div class="mt-3">
                        <a href="<?php echo $link['url']; ?>" class="blob-button"><?php echo $link['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>