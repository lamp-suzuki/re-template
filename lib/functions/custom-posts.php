<?php

function custom_post_type()
{
    // 作業実績の追加
    register_post_type(
        'works', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('作業実績'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('作業実績'), // 単体系のラベル
              'add_new' => _x('新規追加', '作業実績'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
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
            'query_var' => true,
            'hierarchical' => true,
            'rewrite' => [
                'slug' => 'works',
                'with_front' => false,
            ]
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

    // 対応エリアの追加
    register_post_type(
        'area', // 投稿タイプのスラッグの指定
        [
          'labels' => [
              'name' => __('対応エリア'), // メニューに表示されるラベル
              'all_items' => '一覧を表示',
              'singular_name' => __('対応エリア'), // 単体系のラベル
              'add_new' => _x('新規追加', '対応エリア'), // 新規追加のラベル、国際化対応のために投稿タイプを指定
              'add_new_item' => __('新規追加') // 新規項目追加のラベル
          ],
          'show_in_rest' => true,
          'public' => true, // 投稿タイプをパブリックにする
          'has_archive' => false, // アーカイブを無効にする
          'hierarchical' => false, // ページ階層の指定
          'menu_position' => 5, // 管理画面上の配置指定
          'supports' => [
              'title',
              'author',
              'trackbacks',
              'revisions',
          ]
        ]
    );
}
add_action('init', 'custom_post_type');
