<?php

// カスタムフィールド設置
function add_custom_fields()
{
    // top
    add_meta_box(
        'frontpage_setting',
        'トップページ設定',
        'insert_frontpage_fields',
        'page',
        'normal'
    );

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

// キャッチコピー
function insert_frontpage_fields()
{
    global $post;

    $catch_ttl = get_post_meta($post->ID, 'catch_ttl', true);
    $catch_txt = get_post_meta($post->ID, 'catch_txt', true);
    $appeal_1 = get_post_meta($post->ID, 'appeal_1', true);
    $appeal_2 = get_post_meta($post->ID, 'appeal_2', true);
    $appeal_3 = get_post_meta($post->ID, 'appeal_3', true);

    echo <<<EOM
    <h4 class="custom--ttl">キャッチコピー</h4>
    <div class="custom--guroup">
    <label class="custom--label" for="catch_ttl">タイトル</label>
    <input type="text" name="catch_ttl" value="$catch_ttl" class="custom--input" id="catch_ttl" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="catch_txt">本文</label>
    <textarea name="catch_txt" id="catch_txt" class="custom--input" placeholder="50文字以内">$catch_txt</textarea>
    </div>

    <h4 class="custom--ttl">アピールポイント</h4>
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">1. </label>
    <input type="text" name="appeal_1" value="$appeal_1" class="custom--input" id="appeal_1" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">2. </label>
    <input type="text" name="appeal_2" value="$appeal_2" class="custom--input" id="appeal_2" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">3. </label>
    <input type="text" name="appeal_3" value="$appeal_3" class="custom--input" id="appeal_3" placeholder="25文字以内" />
    </div>

    <h4 class="custom--ttl">アピールポイント</h4>
    EOM;
}


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

    // トップページ
    if ($post_type === 'page') {
        if (isset($_POST['catch_ttl'])) {
            update_post_meta($post_id, 'catch_ttl', $_POST['catch_ttl']);
        }
        if (isset($_POST['catch_txt'])) {
            update_post_meta($post_id, 'catch_txt', $_POST['catch_txt']);
        }
    }

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
