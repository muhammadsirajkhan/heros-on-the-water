<?php
/**
 * Menu page — classic grid + signature pizzas (data-driven sections).
 *
 * Template Name: Menu Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main hotw-main hotw-menu">


    <section class="hotw-hero hotw-torn-bottom--white" id="top"
        >
        <img class="hotw-hero__bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-banner.png">
        <div class="hotw-hero__overlay" aria-hidden="true"></div>
        <div class="container py-lg-5">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <p class="hotw-hero__eyebrow">From fire, family, and a love of good</p>
                    <h1 class="hotw-title hotw-title--white mb-0">
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
     * get_template_part( 'template-parts/menu/section', 'classic', array( 'eyebrow' => __( '...', 'heros-on-the-water' ) ) );
     * get_template_part( 'template-parts/menu/section', 'signature', array( 'bg_image' => get_template_directory_uri() . '/assets/images/your-bg.png' ) );
     */
    get_template_part('template-parts/menu/section', 'classic');
    get_template_part('template-parts/menu/section', 'signature');


    get_template_part('template-parts/story/section', 'extras-live');
    ?>
</main>

<?php
get_footer();
