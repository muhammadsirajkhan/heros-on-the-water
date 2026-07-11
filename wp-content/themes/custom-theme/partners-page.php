<?php
/**
 * Our Partners page.
 *
 * Template Name: Our Partners Page
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

get_header();

$uri = get_template_directory_uri();
?>

<main id="primary" class="site-main hotw-main">

    <?php
    get_template_part(
        'template-parts/shared/section',
        'hero-interior',
        array(
            'badge'       => __('OUR PARTNERS', 'heros-on-the-water'),
            'title'       => __('STANDING BESIDE THOSE WHO SERVED', 'heros-on-the-water'),
            'description' => __('We are grateful to the companies, charities, and community organisations who help us deliver free experiences for veterans and families.', 'heros-on-the-water'),
            'bg'          => array(
                'src' => $uri . '/assets/images/g6.png',
                'alt' => __('Fishing with Heroes on the Water', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    get_template_part('template-parts/partners/section', 'supporters');
    get_template_part('template-parts/partners/section', 'partners');
    get_template_part(
        'template-parts/shared/section',
        'group-photo',
        array(
            'src' => $uri . '/assets/images/g1.png',
            'alt' => __('Community group at Heroes on the Water', 'heros-on-the-water'),
        )
    );
    ?>

</main>

<?php
get_footer();
