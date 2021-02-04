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

// 口コミ星
function get_review_stars($avg)
{
    $stars = floor((Float)$avg);
    $half = $avg - $stars;
    $count = 0;
    for ($i=0; $i < $stars; $i++) {
        echo '<i class="fas fa-star"></i>';
        ++$count;
    }
    if ($half >= 0.5) {
        echo '<i class="fas fa-star-half-alt"></i>';
        ++$count;
    } else {
        echo '<i class="far fa-star"></i>';
        ++$count;
    }
    for ($i=0; $i < (5 - $count); $i++) {
        echo '<i class="far fa-star"></i>';
    }
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
        if (get_post_type() == 'post') {
            echo '<li><a href="'.home_url().'/blog/">ブログ</a></li>';
            echo $sep;
        } elseif (get_post_type() == 'works') {
            echo '<li><a href="'.home_url().'/works/">作業実績</a></li>';
            echo $sep;
        }
        $cats = get_the_category();
        if (isset($cats[0]->term_id)) {
            $cat_id = $cats[0]->term_id;
        }
    } elseif (is_category()) {
        echo '<li>ブログ</li>';
        echo $sep;
        $cats = get_queried_object();
        $cat_id = $cats->parent;
    }

    $cat_list = [];
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
        $cats = get_the_terms(get_the_ID(), 'workscat');
        if (isset($cats[0]->term_id)) {
            $cat_id = $cats[0]->term_id;
            $cat_link = get_term_link($cat_id);
            echo '<li><a href="'.$cat_link.'">'.$cats[0]->name.'</a></li>';
            echo $sep;
        }
        the_title('<li>', '</li>');
    } elseif (is_tax('workscat')) {
        echo '<li>作業実績</li>';
        echo $sep;
        the_archive_title('<li>', '</li>');
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

/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：'.esc_html(get_search_query(false));
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {
    }
    return $title;
});

// ページネーション
function pagenation($pages = '', $range = 4)
{
    $showitems = ($range * 1) + 1;
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
