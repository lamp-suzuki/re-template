<?php

function custom_post_type()
{
    // 作業実績の追加
    register_post_type(
        'works', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('事例・実績'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('事例・実績'), // 単体系のラベル
              'add_new' => _x('新規追加', '事例・実績'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
          'show_in_rest' => true,
          'public' => true, // 投稿タイプをパブリックにする
          'has_archive' => true, // アーカイブを有効にする
          'hierarchical' => false, // ページ階層の指定
          'menu_position' => 5, // 管理画面上の配置指定
          'supports' => [
              'title',
              'editor',
              'thumbnail',
              'custom-fields',
              'author',
              'trackbacks',
              'revisions',
          ]
        ]
    );
    register_taxonomy(
        'workscat',
        'works',
        [
            'labels' => [
                'name' => __('実績カテゴリー'),
                'add_new_item' => __('新規追加'),
            ],
            'show_in_rest' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
        ]
    );

    // 口コミの追加
    register_post_type(
        'review', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('口コミ'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('口コミ'), // 単体系のラベル
              'add_new' => _x('新規追加', '口コミ'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
          'show_in_rest' => true,
          'public' => true, // 投稿タイプをパブリックにする
          'has_archive' => false, // アーカイブを有効にする
          'hierarchical' => false, // ページ階層の指定
          'menu_position' => 5, // 管理画面上の配置指定
          'supports' => [
              'title',
              'author',
              'revisions',
          ]
        ]
    );

    // FAQの追加
    register_post_type(
        'faq', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('FAQ'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('FAQ'), // 単体系のラベル
              'add_new' => _x('新規追加', 'FAQ'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
          'show_in_rest' => true,
          'public' => true, // 投稿タイプをパブリックにする
          'has_archive' => false, // アーカイブを無効にする
          'hierarchical' => false, // ページ階層の指定
          'menu_position' => 5, // 管理画面上の配置指定
          'supports' => [
              'title',
              'editor',
              'author',
              'trackbacks',
              'revisions',
          ]
        ]
    );

    // スタッフの追加
    register_post_type(
        'staff', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('スタッフ'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('スタッフ'), // 単体系のラベル
              'add_new' => _x('新規追加', 'スタッフ'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
          'show_in_rest' => true,
          'public' => true, // 投稿タイプをパブリックにする
          'has_archive' => false, // アーカイブを無効にする
          'hierarchical' => false, // ページ階層の指定
          'menu_position' => 5, // 管理画面上の配置指定
          'supports' => [
              'title',
              'thumbnail',
              'editor',
              'author',
              'trackbacks',
              'revisions',
          ]
        ]
    );
}
add_action('init', 'custom_post_type');

// カスタムフィールド設置
function add_custom_fields()
{
    // works
    add_meta_box(
        'works_setting',
        '実績設定',
        'insert_works_fields',
        'works',
        'normal'
    );

    // review
    add_meta_box(
        'custom_setting',
        '口コミ設定',
        'insert_custom_fields',
        'review',
        'normal'
    );
}
add_action('admin_menu', 'add_custom_fields');

// カスタムフィールドの入力エリア（works）
function insert_works_fields()
{
    global $post;

    // 作業場所
    $works_place = get_post_meta(
        $post->ID,
        'works_place',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="works_place">作業場所</label><input type="text" name="works_place" value="'.$works_place.'" class="custom--input" id="works_place" />';
    echo '</div>';

    // 作業時間
    $works_time = get_post_meta(
        $post->ID,
        'works_time',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="works_time">作業時間</label><input type="text" name="works_time" value="'.$works_time.'" class="custom--input" id="works_time" />';
    echo '</div>';

    // 作業人数
    $works_workers = get_post_meta(
        $post->ID,
        'works_workers',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="works_workers">作業人数</label><input type="text" name="works_workers" value="'.$works_workers.'" class="custom--input" id="works_workers" />';
    echo '</div>';

    // 作業料金
    $works_price = get_post_meta(
        $post->ID,
        'works_price',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="works_price">作業料金</label><input type="text" name="works_price" value="'.$works_price.'" class="custom--input" id="works_price" />';
    echo '</div>';
}

// カスタムフィールドの入力エリア（review）
function insert_custom_fields()
{
    global $post;

    // お客様名
    $customer_name = get_post_meta(
        $post->ID,
        'customer_name',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="customer_name">お客様名</label><input type="text" name="customer_name" value="'.$customer_name.'" class="custom--input" id="customer_name" />';
    echo '</div>';

    // 作業内容
    $works_genre = get_post_meta(
        $post->ID,
        'works_genre',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="works_genre">作業内容</label><input type="text" name="works_genre" value="'.$works_genre.'" class="custom--input" id="works_genre" />';
    echo '</div>';

    // 星の数
    $stars = get_post_meta(
        $post->ID,
        'stars',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="stars">点数</label><input type="number" name="stars" min="0" max="5" step="0.1" value="'.($stars == '' ? '3.5' : $stars).'" class="custom--input" id="stars" style="width:auto" />';
    echo '</div>';

    // アイコン画像
    $review_icon = get_post_meta(
        $post->ID,
        'review_icon',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="review_icon">画像の選択</label>';
    echo '<label class="custom--checkbox" for="review_icon_man"><input type="radio" name="review_icon" value="0" id="review_icon_man"'.($review_icon == '' || $review_icon == 0 ? ' checked': '').'>男性</label>';
    echo '<label class="custom--checkbox" for="review_icon_woman"><input type="radio" name="review_icon" value="1" id="review_icon_woman"'.($review_icon == 1 ? ' checked': '').'>女性</label>';
    echo '<label class="custom--checkbox" for="review_icon_oldman"><input type="radio" name="review_icon" value="2" id="review_icon_oldman"'.($review_icon == 2 ? ' checked': '').'>年配の男性</label>';
    echo '<label class="custom--checkbox" for="review_icon_oldwoman"><input type="radio" name="review_icon" value="3" id="review_icon_oldwoman"'.($review_icon == 3 ? ' checked': '').'>年配の女性</label>';
    echo '</div>';

    // 内容
    $review_content = get_post_meta(
        $post->ID,
        'review_content',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="review_content">口コミ内容</label>';
    echo '<textarea class="custom--textarea" name="review_content" id="review_content" rows="8">'.$review_content.'</textarea>';
    echo '</div>';
}

// カスタムフィールドの保存
function save_custom_fields($post_id)
{
    $post_type = get_post_type($post_id);
    // 実績
    if ($post_type === 'works') {
        if (isset($_POST['works_place'])) {
            update_post_meta($post_id, 'works_place', $_POST['works_place']);
        }
        if (isset($_POST['works_time'])) {
            update_post_meta($post_id, 'works_time', $_POST['works_time']);
        }
        if (isset($_POST['works_workers'])) {
            update_post_meta($post_id, 'works_workers', $_POST['works_workers']);
        }
        if (isset($_POST['works_price'])) {
            update_post_meta($post_id, 'works_price', $_POST['works_price']);
        }
    }

    // 口コミ
    if ($post_type === 'review') {
        if (isset($_POST['customer_name'])) {
            update_post_meta($post_id, 'customer_name', $_POST['customer_name']);
        }
        if (isset($_POST['works_genre'])) {
            update_post_meta($post_id, 'works_genre', $_POST['works_genre']);
        }
        if (isset($_POST['stars'])) {
            update_post_meta($post_id, 'stars', $_POST['stars']);
        }
        if (isset($_POST['review_icon'])) {
            update_post_meta($post_id, 'review_icon', $_POST['review_icon']);
        }
        if (isset($_POST['review_content'])) {
            update_post_meta($post_id, 'review_content', $_POST['review_content']);
        }
    }
}
add_action('save_post', 'save_custom_fields');
