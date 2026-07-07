<?php
/**
 * Story: centered heading + pizza Swiper (wood-fired showcase).
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

$pizza_thumb = get_template_directory_uri() . '/assets/images/pizza.png';

$pizzas = array(
    array(
        'name' => __('Pepperoni', 'the-black-door-oven'),
        'desc' => __('Classic tomato base, mozzarella, and crisp pepperoni.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-pepperoni',
    ),
    array(
        'name' => __('Veggie Delight', 'the-black-door-oven'),
        'desc' => __('Seasonal vegetables, herbs, and creamy fior di latte.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-veggie',
    ),
    array(
        'name' => __('Margherita', 'the-black-door-oven'),
        'desc' => __('San Marzano tomatoes, fresh basil, olive oil, and mozzarella.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-margherita',
    ),
    array(
        'name' => __('Hot Honey', 'the-black-door-oven'),
        'desc' => __('Spicy salami, honey drizzle, and a blistered leopard-spot crust.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-honey',
    ),
    array(
        'name' => __('Truffle Mushroom', 'the-black-door-oven'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'the-black-door-oven'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'the-black-door-oven'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'the-black-door-oven'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'the-black-door-oven'),
        'seed' => 'oven-story-pizza-truffle',
    ),
);
?>
<style>
    .swiper-slide-active .oven-story-pizza-card {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pizza-bg.png') !important;
    }
</style>

<?php
$pizza = get_field('pizza');
$sub_title = $pizza['sub_title'];
$title = $pizza['title'];
$content = $pizza['content'];
$items = $pizza['items'];
?>
<section class="oven-section oven-section--cream oven-story-pizza" id="story-menu">
    <div class="container-fluid">
        <header class="oven-story-head text-center mb-4 mb-lg-5">
            <p class="oven-kicker"><?php echo $sub_title; ?></p>
            <h2 class="oven-title"><?php echo $title; ?>
            </h2>

            <div class="oven-prose oven-story-head__lede mx-auto mt-4">
                <p><?php echo $content; ?></p>
            </div>
        </header>

        <div class="swiper oven-story-pizza-swiper oven-story-pizza-swiper-root overflow-hidden" aria-label="">
            <div class="swiper-wrapper">
                <?php foreach ($items as $pizza): ?>
                    <div class="swiper-slide">
                        <article class="oven-story-pizza-card"
                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pizza-bg-2.png');">
                            <div class="oven-story-pizza-card__visual">
                                <div class="oven-story-pizza-card__circle">
                                    <img src="<?php echo $pizza['image']['url']; ?>" alt="" width="480" height="480"
                                        loading="lazy" decoding="async">
                                </div>
                            </div>
                            <span>Black Doc Oven</span>
                            <h3 class="oven-story-pizza-card__name"><?php echo $pizza['title']; ?></h3>
                            <p class="oven-story-pizza-card__desc"><?php echo $pizza['content']; ?></p>
                            <a class="blob-button oven-story-pizza-card__btn"
                                href="<?php echo $pizza['link']['url']; ?>"><?php echo $pizza['link']['title']; ?></a>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination oven-story-pizza-swiper__pagination"></div>
        </div>

        <div class="text-center mt-4 mt-lg-5">
            <span class="oven-story-deco-icon" aria-hidden="true">✦</span>
            <div class="mt-3">
                <a class="blob-button oven-story-cta-red"
                    href="<?php echo esc_url(home_url('/#menu')); ?>"><?php esc_html_e('View menu', 'the-black-door-oven'); ?></a>
            </div>
        </div>
    </div>
</section>