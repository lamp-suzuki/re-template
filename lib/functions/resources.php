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
