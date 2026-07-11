<?php
/**
 * Meet the Team page.
 *
 * Template Name: Meet the Team Page
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
            'badge'       => __('SINCE JULY 2018', 'heros-on-the-water'),
            'title'       => __('HEALING BEGINS ON THE WATER', 'heros-on-the-water'),
            'description' => __('Meet the patrons, trustees, and volunteer hosts who make Heroes on the Water possible for veterans and families across the Isle of Man.', 'heros-on-the-water'),
            'show_scroll' => true,
            'bg'          => array(
                'src' => $uri . '/assets/images/g13.png',
                'alt' => __('Heroes on the Water team', 'heros-on-the-water'),
            ),
        )
    );
    get_template_part('template-parts/shared/section', 'ticker');
    get_template_part('template-parts/team/section', 'patrons');
    get_template_part('template-parts/team/section', 'trustees');
    get_template_part('template-parts/team/section', 'volunteers');
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
