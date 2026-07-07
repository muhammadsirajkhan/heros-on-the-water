<?php
/**
 * Home landing template (static Phase 1; ACF-ready structure).
 *
 * Template Name: Gallery Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();
$lnk = get_template_directory_uri();

$gallery = [];

for ($i = 1; $i <= 12; $i++) {
    $gallery[] = $lnk . "/assets/images/{$i}.png";
}
?>

<div class="hotw-section hotw-section--cream section-gallery">
    <div class="container">
        <header class="hotw-story-head text-center mb-4 mb-lg-5">
            <p class="hotw-kicker">
                <?php esc_html_e('Heroes on the Water', 'heros-on-the-water'); ?>
            </p>
            <h2 class="hotw-title hotw-story-head__title mb-0">
                <?php esc_html_e('Moments from Black', 'heros-on-the-water'); ?> <strong>Dog Oven</strong>
            </h2>
            
            <div class="hotw-prose hotw-story-head__lede mx-auto mt-4">
                <p>
                    <?php esc_html_e('A glimpse into our kitchen, our community, and our nights filled with food, music, and laughter. Every photo tells a story — from handcrafted pizzas to live performances and unforgettable 
evenings with friends and family.', 'heros-on-the-water'); ?>
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