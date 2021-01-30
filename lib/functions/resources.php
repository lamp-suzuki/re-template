<?php

// CSSの管理
function add_my_styles()
{
    wp_enqueue_style(
        'bundle',
        get_template_directory_uri().'/dist/css/style.css',
        [],
        '1.0.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'add_my_styles');

function load_custom_wp_admin_style()
{
    wp_register_style('custom_wp_admin_css', get_stylesheet_directory_uri().'/admin-style.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

// JSの管理
function add_my_scripts()
{
    wp_enqueue_script(
        'bundle',
        get_template_directory_uri().'/dist/js/bundle.js',
        [],
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');
