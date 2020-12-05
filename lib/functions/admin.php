<?php

// 投稿文字数列の追加
function add_posts_columns_count($columns)
{
    $columns['count'] = '文字数';
    return $columns;
}
add_filter('manage_posts_columns', 'add_posts_columns_count');
function custom_posts_columns_count($column_name, $post_id)
{
    if ('count' == $column_name) {
        $count = mb_strlen(strip_tags(get_post_field('post_content', $post_id)));
        echo $count;
    }
}
add_action('manage_posts_custom_column', 'custom_posts_columns_count', 10, 2);

// サムネイル列の追加
function add_posts_columns_thumbnail($columns)
{
    global $post_type;
    if (in_array($post_type, ['post'])) {
        $columns['thumbnail'] = 'アイキャッチ';
    }
    return $columns;
}
add_filter('manage_posts_columns', 'add_posts_columns_thumbnail');
function custom_posts_columns_thumbnail($column_name, $post_id)
{
    if ('thumbnail' === $column_name) {
        $thumb_id  = get_post_thumbnail_id($post_id);
        if ($thumb_id) {
            $thumb_img = wp_get_attachment_image_src($thumb_id, 'medium');
            echo '<img src="',$thumb_img[0],'" width="100px">';
        } else {
            echo 'なし';
        }
    }
}
add_action('manage_posts_custom_column', 'custom_posts_columns_thumbnail', 10, 2);


function sort_posts_column($columns)
{
    $columns = [
        'cb' => '<input type="checkbox" />',
        'thumbnail' => 'アイキャッチ',
        'title' => '記事タイトル',
        'categories' => 'カテゴリー',
        'tags' => 'タグ',
        'count' => '記事文字数',
        'date' => '日時',
        'author' => '作成者',
    ];
    return $columns;
}
add_filter('manage_posts_columns', 'sort_posts_column');
