<?php
/**
 * Menu: classic pizzas grid (cream section, optional featured card).
 *
 * @package The_Black_Door_Oven
 *
 * Third argument: flat array or array( 'menu_classic_defaults' => array(...) ).
 */

if (!defined('ABSPATH')) {
    exit;
}

$menu_classic_default_args = array(
    'section_id' => 'menu-classic',
    'section_class' => 'oven-section oven-section--cream oven-menu-classic',
    'eyebrow' => __('Classic Pizzas', 'the-black-door-oven'),
    'title' => __('Our Classic Pizza', 'the-black-door-oven'),
    'title_script' => __('Selection', 'the-black-door-oven'),
    'items' => array(
        array(
            'title' => __('Old Faithful (V)', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('The Manx margherita with a blend of local cheddar and mozzarella on our house tomato sauce.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'title' => __('The Black Dog', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('Spicy pork sausage with oven-roasted red peppers on a classic cheese and tomato base.', 'the-black-door-oven'),
            'featured' => true,
        ),
        array(
            'title' => __('Cosmo (V)', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('Brie cheese with ribbons of courgette and caramelised red onion on a tomato base.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'title' => __('Hobo', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('Butcher\'s ham with thyme-roasted mushrooms and a sprinkling of spring onion.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'title' => __('Tramp', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('Butcher\'s ham with pineapple and spring onion for a sweet and savoury balance.', 'the-black-door-oven'),
            'featured' => false,
        ),
        array(
            'title' => __('Growler', 'the-black-door-oven'),
            'rating' => '4.9',
            'description' => __('A meat lover\'s favorite with sausage, ham, and salami.', 'the-black-door-oven'),
            'featured' => false,
        ),
    ),
);

$passed = array();
if (isset($args) && is_array($args)) {
    if (!empty($args['menu_classic_defaults']) && is_array($args['menu_classic_defaults'])) {
        $passed = $args['menu_classic_defaults'];
    } else {
        $passed = $args;
        unset($passed['menu_classic_defaults']);
    }
}

$classic = wp_parse_args($passed, $menu_classic_default_args);
if (isset($passed['items']) && is_array($passed['items'])) {
    $classic['items'] = $passed['items'];
}
?>
<section class="oven-section <?php echo esc_attr($classic['section_class']); ?>" id="<?php echo esc_attr($classic['section_id']); ?>"
    aria-labelledby="<?php echo esc_attr($classic['section_id']); ?>-title">
    <div class="container py-lg-2">
        <header class="oven-menu-classic__head text-center mb-4 mb-lg-5">
            <p class="oven-kicker"><?php echo esc_html($classic['eyebrow']); ?></p>
            <h2 class="oven-title oven-menu-classic__title mb-0"
                id="<?php echo esc_attr($classic['section_id']); ?>-title">
                <?php echo esc_html($classic['title']); ?> <strong>Selection</strong>
            </h2>
            <!-- <span class="oven-script oven-menu-classic__script"
                aria-hidden="true"><?php echo esc_html($classic['title_script']); ?></span> -->
        </header>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 g-lg-4 oven-menu-classic__grid">
            <?php foreach ($classic['items'] as $index => $item): ?>
                <?php
                $featured = !empty($item['featured']);
                $rating = isset($item['rating']) ? (string) $item['rating'] : '';
                ?>
                <div class="col">
                    <article
                        class="oven-menu-classic-card<?php echo $featured ? ' oven-menu-classic-card--featured' : ''; ?>">
                        <div class="oven-menu-classic-card__image_bg">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/menu-bg-1.png'); ?>"
                                alt="">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/menu-bg-2.png'); ?>"
                                alt="">
                        </div>
                        <div class="oven-menu-classic-card__top">
                            <h3 class="oven-menu-classic-card__title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                            <?php if ($rating !== ''): ?>
                                <p class="oven-menu-classic-card__rating">
                                    <span class="oven-menu-classic-card__star" aria-hidden="true"><img
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/star.png'); ?>"
                                            alt=""></span>
                                    <span class="visually-hidden"><?php esc_html_e('Rating', 'the-black-door-oven'); ?></span>
                                    <span><?php echo esc_html($rating); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>
                        <p class="oven-menu-classic-card__desc"><?php echo esc_html($item['description'] ?? ''); ?></p>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>