<?php
/**
 * Story: centered heading + pizza Swiper (wood-fired showcase).
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$pizza_thumb = get_template_directory_uri() . '/assets/images/pizza.png';

$pizzas = array(
    array(
        'name' => __('Pepperoni', 'heros-on-the-water'),
        'desc' => __('Classic tomato base, mozzarella, and crisp pepperoni.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-pepperoni',
    ),
    array(
        'name' => __('Veggie Delight', 'heros-on-the-water'),
        'desc' => __('Seasonal vegetables, herbs, and creamy fior di latte.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-veggie',
    ),
    array(
        'name' => __('Margherita', 'heros-on-the-water'),
        'desc' => __('San Marzano tomatoes, fresh basil, olive oil, and mozzarella.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-margherita',
    ),
    array(
        'name' => __('Hot Honey', 'heros-on-the-water'),
        'desc' => __('Spicy salami, honey drizzle, and a blistered leopard-spot crust.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-honey',
    ),
    array(
        'name' => __('Truffle Mushroom', 'heros-on-the-water'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'heros-on-the-water'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'heros-on-the-water'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-truffle',
    ),
    array(
        'name' => __('Truffle Mushroom', 'heros-on-the-water'),
        'desc' => __('Wild mushrooms, truffle oil, parmesan, and rocket finish.', 'heros-on-the-water'),
        'seed' => 'hotw-story-pizza-truffle',
    ),
);
?>
<style>
    .swiper-slide-active .hotw-story-pizza-card {
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
<section class="hotw-section hotw-section--cream hotw-story-pizza" id="story-menu">
    <div class="container-fluid">
        <header class="hotw-story-head text-center mb-4 mb-lg-5">
            <p class="hotw-kicker"><?php echo $sub_title; ?></p>
            <h2 class="hotw-title"><?php echo $title; ?>
            </h2>

            <div class="hotw-prose hotw-story-head__lede mx-auto mt-4">
                <p><?php echo $content; ?></p>
            </div>
        </header>

        <div class="swiper hotw-story-pizza-swiper hotw-story-pizza-swiper-root overflow-hidden" aria-label="">
            <div class="swiper-wrapper">
                <?php foreach ($items as $pizza): ?>
                    <div class="swiper-slide">
                        <article class="hotw-story-pizza-card"
                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pizza-bg-2.png');">
                            <div class="hotw-story-pizza-card__visual">
                                <div class="hotw-story-pizza-card__circle">
                                    <img src="<?php echo $pizza['image']['url']; ?>" alt="" width="480" height="480"
                                        loading="lazy" decoding="async">
                                </div>
                            </div>
                            <span>Black Doc Oven</span>
                            <h3 class="hotw-story-pizza-card__name"><?php echo $pizza['title']; ?></h3>
                            <p class="hotw-story-pizza-card__desc"><?php echo $pizza['content']; ?></p>
                            <a class="blob-button hotw-story-pizza-card__btn"
                                href="<?php echo $pizza['link']['url']; ?>"><?php echo $pizza['link']['title']; ?></a>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination hotw-story-pizza-swiper__pagination"></div>
        </div>

        <div class="text-center mt-4 mt-lg-5">
            <span class="hotw-story-deco-icon" aria-hidden="true">✦</span>
            <div class="mt-3">
                <a class="blob-button hotw-story-cta-red"
                    href="<?php echo esc_url(home_url('/#menu')); ?>"><?php esc_html_e('View menu', 'heros-on-the-water'); ?></a>
            </div>
        </div>
    </div>
</section>