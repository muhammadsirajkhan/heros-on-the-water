<?php
/**
 * FAQ accordion section.
 *
 * @package Heros_On_The_Water
 */

if (!defined('ABSPATH')) {
    exit;
}

$faq_id = 'hotwFaq';
?>


<?php
$faq = get_field('faq', 10);
$sub_title = $faq['sub_title'];
$title = $faq['title'];
$items = $faq['items'];
?>
<style>
    .hotw-faq .accordion-item:has(.accordion-button) {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-1.png');
        background-size: 100% 100%;

    }

    .hotw-faq .accordion-item:has(.accordion-button:not(.collapsed)) {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-2.png');
        background-size: 100% 100%;

    }

    .hotw-faq__icon
    {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-6.png');
        background-size: 100% 100%;
    }

    .hotw-faq .accordion-button:not(.collapsed) .hotw-faq__icon{
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-7.png');
        background-size: 100% 100%;
    }
</style>
<span class="hotw-faq__border d-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fifth-5.png" alt="" class="img-fluid">
</span>

<section class="hotw-section hotw-section--cream" id="faq">
    <div class="container">
        <header class="text-center mb-5">
            <p class="hotw-kicker"><?php echo $sub_title; ?></p>
            <h2 class="hotw-title"><?php echo $title; ?></h2>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion hotw-faq" id="<?php echo esc_attr($faq_id); ?>">
                    <?php
                    // $items = array(
                    //     array(
                    //         'q' => __('Do you take reservations?', 'heros-on-the-water'),
                    //         'a' => __('Yes — evenings fill quickly on weekends. Call ahead or message us on social and we will hold a table when we can.', 'heros-on-the-water'),
                    //     ),
                    //     array(
                    //         'q' => __('Is there vegetarian or vegan pizza?', 'heros-on-the-water'),
                    //         'a' => __('We keep seasonal vegetarian pies on the board and can prepare vegan options with advance notice.', 'heros-on-the-water'),
                    //     ),
                    //     array(
                    //         'q' => __('Do you offer takeout?', 'heros-on-the-water'),
                    //         'a' => __('Absolutely. Order at the counter or use the link on this site during service hours.', 'heros-on-the-water'),
                    //     ),
                    // );
                    foreach ($items as $i => $row):
                        $collapse_id = $faq_id . '-' . $i;
                        $is_first = ($i === 0);
                        ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button<?php echo $is_first ? '' : ' collapsed'; ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                    aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                                    aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                    <?php echo esc_html($row['q']); ?>
                                    <span class="hotw-faq__icon" aria-hidden="true"></span>
                                </button>
                            </h3>
                            <div id="<?php echo esc_attr($collapse_id); ?>"
                                class="accordion-collapse collapse<?php echo $is_first ? ' show' : ''; ?>"
                                data-bs-parent="#<?php echo esc_attr($faq_id); ?>">
                                <div class="accordion-body">
                                    <?php echo esc_html($row['a']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<span class="hotw-faq__border d-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fifth-4.png" alt="" class="img-fluid">
</span>