<?php
/**
 * Home landing template (static Phase 1; ACF-ready structure).
 *
 * Template Name: Gallery Page
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();
$lnk = get_template_directory_uri();

$gallery = [];

for ($i = 1; $i <= 12; $i++) {
    $gallery[] = $lnk . "/assets/images/{$i}.png";
}
?>

<div class="oven-section oven-section--cream section-gallery">
    <div class="container">
        <header class="oven-story-head text-center mb-4 mb-lg-5">
            <p class="oven-kicker">
                <?php esc_html_e('Black Dog Oven', 'the-black-door-oven'); ?>
            </p>
            <h2 class="oven-title oven-story-head__title mb-0">
                <?php esc_html_e('Moments from Black', 'the-black-door-oven'); ?> <strong>Dog Oven</strong>
            </h2>
            
            <div class="oven-prose oven-story-head__lede mx-auto mt-4">
                <p>
                    <?php esc_html_e('A glimpse into our kitchen, our community, and our nights filled with food, music, and laughter. Every photo tells a story — from handcrafted pizzas to live performances and unforgettable 
evenings with friends and family.', 'the-black-door-oven'); ?>
                </p>
            </div>
        </header>
        <div class="gallery-main">
            <?php
            foreach ($gallery as $img) { ?>
                <div class="gallery-items">
                    <?php echo '<img src="' . $img . '" alt="Gallery Image">'; ?>
                </div>
            <?php }
            ?>

        </div>
    </div>
</div>


<?php
get_footer();