<?php

// 口コミ件数
function get_review_counts()
{
    return wp_count_posts('review')->publish;
}

// 口コミ平均
function get_review_avg()
{
    global $wpdb;
    $query = "SELECT CAST(AVG(`meta_value`) AS DECIMAL(10,1)) FROM $wpdb->postmeta WHERE `meta_key`='stars'";
    return round((float)$wpdb->get_var($query), 1);
}


// パンくず
function get_theme_breadcrumb()
{
    $sep = '<li>></li>';
    echo '<div class="breadcrumb--wrap">';
    echo '<div class="container">';
    echo '<ol class="breadcrumb">';
    echo '<li><a href="'.get_bloginfo('url').'" >トップページ</a></li>';
    echo $sep;

    //投稿記事ページとカテゴリーページでの、カテゴリーの階層を表示
    $cats = '';
    $cat_id = '';
    if (is_single()) {
        $cats = get_the_category();
        if (isset($cats[0]->term_id)) {
            $cat_id = $cats[0]->term_id;
        }
    } elseif (is_category()) {
        $cats = get_queried_object();
        $cat_id = $cats->parent;
    }
    $cat_list = array();
    while ($cat_id != 0) {
        $cat = get_category($cat_id);
        $cat_link = get_category_link($cat_id);
        array_unshift($cat_list, '<a href="'.$cat_link.'">'.$cat->name.'</a>');
        $cat_id = $cat->parent;
    }
    foreach ($cat_list as $value) {
        echo '<li>'.$value.'</li>';
        echo $sep;
    }

    //現在のページ名を表示
    if (is_singular()) {
        if (is_attachment()) {
            previous_post_link('<li>%link</li>');
            echo $sep;
        }
        the_title('<li>', '</li>');
    } elseif (is_archive()) {
        the_archive_title('<li>', '</li>');
    } elseif (is_search()) {
        echo '<li>検索 : '.get_search_query().'</li>';
    } elseif (is_404()) {
        echo '<li>ページが見つかりません</li>';
    }
    echo '</ol>';
    echo '</div>';
    echo '</div>';
}

// ページネーション
function pagenation($pages = '', $range = 4)
{
    $showitems = ($range * 1)+1;
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo '<nav class="mt-5" aria-label="Page navigation">';
        echo '<ul class="pagination justify-content-center">';
        // 「前へ」を表示
        if ($paged > 1) {
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'">&lt;</a></li>';
        }
        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                echo ($paged == $i)? '<li class="page-item active"><span class="page-link">'.$i.'</span></li>':
                    '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
            }
        }
        // 「次へ」を表示
        if ($paged < $pages) {
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'">&gt;</a></li>';
        }
        echo "</ul>";
        echo "</nav>";
    }
}
