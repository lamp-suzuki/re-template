<?php

function themename_theme_customizer($wp_customize)
{
    // ロゴ設定
    $wp_customize->add_section('logo_section', array(
        'title' => 'ロゴ画像', //セクション名
        'priority' => 30, //カスタマイザー項目の表示順
        'description' => 'サイトのロゴ設定。', //セクションの説明
    ));
    $wp_customize->add_setting('logo_image_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image_url', array(
        'label' => 'ロゴ', //設定ラベル
        'section' => 'logo_section', //セクションID
        'settings' => 'logo_image_url', //セッティングID
        'description' => '画像をアップロードするとヘッダーにあるデフォルトのサイト名と入れ替わります。',
    )));

    // カラー設定
    $wp_customize->add_setting('body_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting('primary_color', array(
        'default' => '#d20000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#ffc800',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_color', array(
        'label' => '文字色',
        'section' => 'colors',
        'priority' => 1,
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'メインカラー',
        'section' => 'colors',
        'priority' => 1,
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => 'サブカラー',
        'section' => 'colors',
        'priority' => 2,
    )));
}
add_action('customize_register', 'themename_theme_customizer'); //カスタマイザーに登録

//ロゴイメージURLの取得
function get_the_logo_image_url()
{
    return esc_url(get_theme_mod('logo_image_url'));
}
