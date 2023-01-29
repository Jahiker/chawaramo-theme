<?php

function chawaramo_load_assets()
{
    wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0', true);
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'chawaramo_load_assets');

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/**
 * Allow big images
 */
add_filter('big_image_size_threshold', '__return_false');

/**
 * Register ACF Custom Menu
 * https://www.advancedcustomfields.com/resources/acf_add_options_page/
 */
function ditto_menu_settings()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Theme Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-settings',
            'capability'    => 'edit_posts',
            'redirect'      =>  true
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Header',
            'menu_title'     => 'Header',
            'parent_slug'   => 'theme-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Footer',
            'menu_title'     => 'Footer',
            'parent_slug'   => 'theme-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => '404 Error',
            'menu_title'     => '404 Error',
            'parent_slug'   => 'theme-settings',
        ));
    }
}

add_action('init', 'ditto_menu_settings');


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
