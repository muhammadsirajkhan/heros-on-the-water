<?php
/**
 * Menu: signature pizzas — dark hero-style band, image row, optional featured card.
 *
 * @package The_Black_Door_Oven
 *
 * Third argument: flat array or array( 'menu_signature_defaults' => array(...) ).
 */

if (!defined('ABSPATH')) {
    exit;
}

$base = get_template_directory_uri() . '/assets/images/';

$menu_signature_default_args = array(
    'section_id' => 'menu-signature',
    'section_class' => 'oven-menu-signature oven-torn-top--white oven-torn-bottom--white',
    'bg_image' => $base . 'singature-banner.png',
    'eyebrow' => __('Classic Pizzas', 'the-black-door-oven'),
    'title' => __('Signature', 'the-black-door-oven'),
    'title_script' => __('Pizzas', 'the-black-door-oven'),
    'lede' => __('Handcrafted wood-fired pizzas, cold drinks, and live music — the room glows while dough proofs and the fire stays hot.', 'the-black-door-oven'),
    'lede_emphasis' => __('Come for the pizza, stay for the atmosphere.', 'the-black-door-oven'),
    'card_subtitle' => __('Black Dog Oven', 'the-black-door-oven'),
    'items' => array(
        array(
            'image' => $base . 'classic-1.png',
            'title' => __('Erocious Dog', 'the-black-door-oven'),
            'description' => __('Classic tomato sauce, mozzarella & fresh basil.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'image' => $base . 'classic-2.png',
            'title' => __('The Green Dog', 'the-black-door-oven'),
            'description' => __('Pesto base, mozzarella, rocket, and shaved parmesan.', 'the-black-door-oven'),
            'featured' => true,
        ),
        array(
            'image' => $base . 'classic-3.png',
            'title' => __('Salty Dog', 'the-black-door-oven'),
            'description' => __('Anchovies, capers, olives, and tomato on a thin crust.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'image' => $base . 'classic-4.png',
            'title' => __('Wild Dog (V)', 'the-black-door-oven'),
            'description' => __('Seasonal veg, chilli oil, and smoked garlic aioli.', 'the-black-door-oven'),
            'featured' => false,
        ),
    ),
);

$passed = array();
if (isset($args) && is_array($args)) {
    if (!empty($args['menu_signature_defaults']) && is_array($args['menu_signature_defaults'])) {
        $passed = $args['menu_signature_defaults'];
    } else {
        $passed = $args;
        unset($passed['menu_signature_defaults']);
    }
}

$sig = wp_parse_args($passed, $menu_signature_default_args);
if (isset($passed['items']) && is_array($passed['items'])) {
    $sig['items'] = $passed['items'];
}
?>
<section class="oven-section <?php echo esc_attr($sig['section_class']); ?>" id="<?php echo esc_attr($sig['section_id']); ?>"
    aria-labelledby="<?php echo esc_attr($sig['section_id']); ?>-title">
    <div class="oven-menu-signature__bg" style="background-image:url(<?php echo esc_url($sig['bg_image']); ?>);"
        aria-hidden="true"></div>
    
    <div class="container position-relative oven-menu-signature__inner">
        <header class="row align-items-start g-4 g-lg-5 mb-4 mb-lg-5 oven-menu-signature__head">
            <div class="col-lg-4 ">
                <p class="oven-kicker"><?php echo esc_html($sig['eyebrow']); ?></p>
                <h2 class="oven-title oven-title--white oven-menu-signature__title mb-0"
                    id="<?php echo esc_attr($sig['section_id']); ?>-title">
                    <?php echo esc_html($sig['title']); ?> <strong>Pizzas</strong>
                </h2>
                
            </div>
            <div class="col-lg-6 ms-lg-auto">
                <div class="oven-prose oven-prose--on-dark oven-menu-signature__lede">
                   <p>
                       At Black Dog Oven, we believe that the best moments in life happen around great food. Our family-run venue brings together handcrafted wood-fired pizzas, refreshing drinks, and live local music to create a
                       relaxed and welcoming place for everyone.
                   </p>

<p>
    Whether you're joining us for a casual dinner, meeting friends for drinks,
    or enjoying an evening of live music, we aim to make
    every visit memorable.
</p>

<p><strong>Come for the pizza, stay for the Atmosphere.</strong></p>
                </div>
            </div>
        </header>

        <div class="oven-menu-signature__scroller">
            <div class="row g-4 oven-menu-signature__row">
                <?php foreach ($sig['items'] as $item): ?>
                    <?php $featured = !empty($item['featured']); ?>
                    <div class="col oven-menu-signature__col">
                        <article class="oven-menu-sig-card<?php echo $featured ? ' oven-menu-sig-card--featured' : ''; ?>">
                            <div class="oven-menu-classic-card__image_bg">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bg-1.png'); ?>"
                                    alt="">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bg-2.png'); ?>"
                                    alt="">
                            </div>
                            <div class="oven-menu-sig-card__frame">
                                <img src="<?php echo esc_url($item['image'] ?? ''); ?>" alt="" width="320" height="320"
                                    loading="lazy" decoding="async">
                            </div>
                            <p class="oven-menu-sig-card__kicker"><?php echo esc_html($sig['card_subtitle']); ?></p>
                            <h3 class="oven-menu-sig-card__title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                            <p class="oven-menu-sig-card__desc"><?php echo esc_html($item['description'] ?? ''); ?></p>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>