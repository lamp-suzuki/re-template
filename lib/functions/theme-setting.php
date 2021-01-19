<?php

///////////////////////////////////////
// テーマカスタマイザーにロゴアップロード設定機能追加
///////////////////////////////////////
define('LOGO_SECTION', 'logo_section'); //セクションIDの定数化
define('LOGO_IMAGE_URL', 'logo_image_url'); //セッティングIDの定数化
function themename_theme_customizer($wp_customize)
{
    $wp_customize->add_section(LOGO_SECTION, array(
        'title' => 'ロゴ画像', //セクション名
        'priority' => 30, //カスタマイザー項目の表示順
        'description' => 'サイトのロゴ設定。', //セクションの説明
    ));

    $wp_customize->add_setting(LOGO_IMAGE_URL);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, LOGO_IMAGE_URL, array(
        'label' => 'ロゴ', //設定ラベル
        'section' => LOGO_SECTION, //セクションID
        'settings' => LOGO_IMAGE_URL, //セッティングID
        'description' => '画像をアップロードするとヘッダーにあるデフォルトのサイト名と入れ替わります。',
    )));
}
add_action('customize_register', 'themename_theme_customizer'); //カスタマイザーに登録

//ロゴイメージURLの取得
function get_the_logo_image_url()
{
    return esc_url(get_theme_mod(LOGO_IMAGE_URL));
}
