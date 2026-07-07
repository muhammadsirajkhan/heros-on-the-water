<?php
/**
 * Menu page — classic grid + signature pizzas (data-driven sections).
 *
 * Template Name: Menu Page
 *
 * @package The_Black_Door_Oven
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main oven-main oven-menu">


    <section class="oven-hero oven-torn-bottom--white" id="top"
        >
        <img class="oven-hero__bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-banner.png">
        <div class="oven-hero__overlay" aria-hidden="true"></div>
        <div class="container py-lg-5">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <p class="oven-hero__eyebrow">From fire, family, and a love of good</p>
                    <h1 class="oven-title oven-title--white mb-0">
                        Our Menu
                        Crafted With <strong>Real Fire</strong>
                    </h1>
                    
                </div>
            </div>
        </div>
    </section>


    <?php
    /**
     * Sections ship with defaults inside each template. Override from here, e.g.:
     * get_template_part( 'template-parts/menu/section', 'classic', array( 'eyebrow' => __( '...', 'the-black-door-oven' ) ) );
     * get_template_part( 'template-parts/menu/section', 'signature', array( 'bg_image' => get_template_directory_uri() . '/assets/images/your-bg.png' ) );
     */
    get_template_part('template-parts/menu/section', 'classic');
    get_template_part('template-parts/menu/section', 'signature');


    get_template_part('template-parts/story/section', 'extras-live');
    ?>
</main>

<?php
get_footer();
