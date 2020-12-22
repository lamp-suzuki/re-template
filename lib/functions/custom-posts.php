<?php

function custom_post_type()
{
    // 作業実績の追加
    register_post_type(
        'works', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('作業実績'), // メニューに表示されるラベル
              'singular_name' => __('作業実績'), // 単体系のラベル
              'add_new' => _x('新規追加', '作業実績'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
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
}
add_action('init', 'custom_post_type');
