<?php
/**
 * Hero section (configurable via $args from get_template_part third parameter).
 *
 * @package The_Black_Door_Oven
 *
 * @example Default (home):
 *   get_template_part( 'template-parts/home/section', 'hero' );
 *
 * @example Another page (flat $args — same keys as defaults):
 *   get_template_part( 'template-parts/home/section', 'hero', $my_hero_array );
 *
 * @example Wrapped key (optional):
 *   get_template_part( 'template-parts/home/section', 'hero', array( 'hero_defaults' => $my_hero_array ) );
 */

if (!defined('ABSPATH')) {
    exit;
}

$hero_default_args = array(
    'section_id' => 'top',
    'section_class' => 'oven-hero oven-torn-bottom--white',
    'aria_label' => __('Hero', 'the-black-door-oven'),
    'eyebrow' => __('Authentic wood fired pizza since 2012', 'the-black-door-oven'),
    'title' => __('The Beginning of Pizzeria', 'the-black-door-oven'),
    'title_strong' => __('Journey.', 'the-black-door-oven'),
    'description' => __('From slow-fermented dough to the last ember in our oven — every night is built on tradition, fire, and the people around our table.', 'the-black-door-oven'),
    'bg' => array(
        'src' => get_template_directory_uri() . '/assets/images/hero.png',
        'alt' => '',
        'width' => 1920,
        'height' => 900,
        'loading' => 'eager',
        'fetchpriority' => 'high',
    ),
);

$passed = array();
if (isset($args) && is_array($args)) {
    if (!empty($args['hero_defaults']) && is_array($args['hero_defaults'])) {
        $passed = $args['hero_defaults'];
    } else {
        $passed = $args;
        unset($passed['hero_defaults']);
    }
}

$hero = wp_parse_args($passed, $hero_default_args);
$hero['bg'] = wp_parse_args(
    isset($passed['bg']) && is_array($passed['bg']) ? $passed['bg'] : array(),
    $hero_default_args['bg']
);
$hero['title_strong'] = isset($hero['title_strong']) ? (string) $hero['title_strong'] : '';
?>

<?php
$hero = get_field('hero');
$image = $hero['image'];
$sub_title = $hero['sub_title'];
$title = $hero['title'];
$content = $hero['content'];
?>
<section class="oven-hero oven-torn-bottom--white" id="top">
    <img class="oven-hero__bg" src="<?php echo esc_url($hero['image']['url']); ?>" class="img-fluid">
    <div class="oven-hero__overlay" aria-hidden="true"></div>
    <div class="container py-lg-5">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <p class="oven-hero__eyebrow"><?php echo $hero['sub_title']; ?></p>
                <h1 class="oven-title oven-title--white mb-0">
                    <?php echo $hero['title']; ?>
                </h1>
                <div class="oven-prose oven-prose--on-dark mt-4">
                    <p><?php echo $hero['content']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>