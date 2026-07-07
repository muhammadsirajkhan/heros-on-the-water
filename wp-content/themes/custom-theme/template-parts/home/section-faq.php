<?php
/**
 * FAQ accordion section.
 *
 * @package The_Black_Door_Oven
 */

if (!defined('ABSPATH')) {
    exit;
}

$faq_id = 'ovenFaq';
?>


<?php
$faq = get_field('faq', 10);
$sub_title = $faq['sub_title'];
$title = $faq['title'];
$items = $faq['items'];
?>
<style>
    .oven-faq .accordion-item:has(.accordion-button) {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-1.png');
        background-size: 100% 100%;

    }

    .oven-faq .accordion-item:has(.accordion-button:not(.collapsed)) {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-2.png');
        background-size: 100% 100%;

    }

    .oven-faq__icon
    {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-6.png');
        background-size: 100% 100%;
    }

    .oven-faq .accordion-button:not(.collapsed) .oven-faq__icon{
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fifth-7.png');
        background-size: 100% 100%;
    }
</style>
<span class="oven-faq__border d-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fifth-5.png" alt="" class="img-fluid">
</span>

<section class="oven-section oven-section--cream" id="faq">
    <div class="container">
        <header class="text-center mb-5">
            <p class="oven-kicker"><?php echo $sub_title; ?></p>
            <h2 class="oven-title"><?php echo $title; ?></h2>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion oven-faq" id="<?php echo esc_attr($faq_id); ?>">
                    <?php
                    // $items = array(
                    //     array(
                    //         'q' => __('Do you take reservations?', 'the-black-door-oven'),
                    //         'a' => __('Yes — evenings fill quickly on weekends. Call ahead or message us on social and we will hold a table when we can.', 'the-black-door-oven'),
                    //     ),
                    //     array(
                    //         'q' => __('Is there vegetarian or vegan pizza?', 'the-black-door-oven'),
                    //         'a' => __('We keep seasonal vegetarian pies on the board and can prepare vegan options with advance notice.', 'the-black-door-oven'),
                    //     ),
                    //     array(
                    //         'q' => __('Do you offer takeout?', 'the-black-door-oven'),
                    //         'a' => __('Absolutely. Order at the counter or use the link on this site during service hours.', 'the-black-door-oven'),
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
                                    <span class="oven-faq__icon" aria-hidden="true"></span>
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
<span class="oven-faq__border d-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fifth-4.png" alt="" class="img-fluid">
</span>