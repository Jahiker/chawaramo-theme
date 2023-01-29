<?php

function chawaramo_load_assets()
{
    wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0', true);
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'chawaramo_load_assets');

/**
 * Theme Includes
 */
$chawaramo_users_includes = array(
    '/endpoints.php',               // Register endpoints.
);

foreach ($chawaramo_users_includes as $file) {
    require_once __DIR__ . '/inc' . $file;
}

/*** +Register Navigation Menus ***/
function chawaramo_theme_navigation_menus()
{
    $locations = array(
        'main_menu' => __('Main Menu', 'text_domain')
    );
    register_nav_menus($locations);
}

add_action('init', 'chawaramo_theme_navigation_menus');
/*** -Register Navigation Menus ***/

/*** +Theme support ***/
function chawaramo_add_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'chawaramo_add_support');
/*** +Theme support ***/
