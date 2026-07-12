<?php
/**
 * Front page: static Page uses its assigned template; latest-posts home uses home.php.
 *
 * @package Heros_On_The_Water
 */

defined('ABSPATH') || exit;

if (is_page()) {
    $page_template = get_page_template();
    if ($page_template && is_readable($page_template)) {
        load_template($page_template);
        return;
    }
}

require get_template_directory() . '/home.php';
