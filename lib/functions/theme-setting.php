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

    // スライドショー設定
    $wp_customize->add_section('slide_section_pc', array(
        'title' => 'スライドショー設定（PC用）',
        'priority' => 30,
    ));
    for ($i=1; $i <= 5; $i++) {
        $wp_customize->add_setting('pc_slide_image_url_'.$i);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc_slide_image_url_'.$i, array(
            'label' => 'スライドショー'.$i,
            'section' => 'slide_section_pc',
            'settings' => 'pc_slide_image_url_'.$i,
        )));
    }

    $wp_customize->add_section('slide_section_sp', array(
        'title' => 'スライドショー設定（スマホ用）',
        'priority' => 30,
    ));
    for ($i=1; $i <= 5; $i++) {
        $wp_customize->add_setting('sp_slide_image_url_'.$i);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp_slide_image_url_'.$i, array(
            'label' => 'スライドショー'.$i,
            'section' => 'slide_section_sp',
            'settings' => 'sp_slide_image_url_'.$i,
        )));
    }

    // プロフィール写真
    $wp_customize->add_section('profile_pict', array(
        'title' => 'プロフィール写真', //セクション名
        'priority' => 30, //カスタマイザー項目の表示順
        // 'description' => 'サイトのロゴ設定。', //セクションの説明
    ));
    $wp_customize->add_setting('profile_pict_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'profile_pict_url', array(
        'label' => '写真', //設定ラベル
        'section' => 'profile_pict', //セクションID
        'settings' => 'profile_pict_url', //セッティングID
        // 'description' => '',
    )));

    // デフォルトアイキャッチ
    $wp_customize->add_section('default_thumbnail', array(
        'title' => 'デフォルトアイキャッチ', //セクション名
        'priority' => 30, //カスタマイザー項目の表示順
        'description' => 'デフォルトアイキャッチ', //セクションの説明
    ));
    $wp_customize->add_setting('default_thumbnail_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'default_thumbnail_url', array(
        'label' => 'デフォルトアイキャッチ', //設定ラベル
        'section' => 'default_thumbnail', //セクションID
        'settings' => 'default_thumbnail_url', //セッティングID
        'description' => 'アイキャッチが設定されていない場合の画像をアップロードください。',
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

// ロゴイメージURLの取得
function get_the_logo_image_url()
{
    return esc_url(get_theme_mod('logo_image_url'));
}

// デフォルトアイキャッチの反映
function save_default_thumbnail($post_id)
{
    $post_thumbnail= get_post_meta($post_id, '_thumbnail_id', true);
    if (!wp_is_post_revision($post_id)) {
        if (empty($post_thumbnail) && (get_theme_mod('default_thumbnail_url') != null && get_theme_mod('default_thumbnail_url') != '')) {
            update_post_meta($post_id, '_thumbnail_id', get_attachment_id(get_theme_mod('default_thumbnail_url')));
        }
    }
}
add_action('save_post', 'save_default_thumbnail');

/**
 * 画像のURLからattachemnt_idを取得する
 *
 * @param string $url 画像のURL
 * @return int attachment_id
 */
function get_attachment_id($url)
{
    global $wpdb;
    $sql = "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s";
    preg_match('/([^\/]+?)(-e\d+)?(-\d+x\d+)?(\.\w+)?$/', $url, $matches);
    $post_name = $matches[1];
    return (int)$wpdb->get_var($wpdb->prepare($sql, $post_name));
}
