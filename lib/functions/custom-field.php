<?php
/**
 * ビジュアルエディタに表(テーブル)の機能を追加します。
 */
function mce_external_plugins_table($plugins)
{
    $plugins['table'] = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
    return $plugins;
}
add_filter('mce_external_plugins', 'mce_external_plugins_table');

/**
 * ビジュアルエディタにテーブル用のボタンを追加します。
 */
function mce_buttons_table($buttons)
{
    $buttons[] = 'table';
    return $buttons;
}
add_filter('mce_buttons', 'mce_buttons_table');

// 固定ページのみ無効
function disable_block_editor($use_block_editor, $post_type)
{
    if ($post_type === 'page') {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'disable_block_editor', 10, 2);

// カスタムフィールド設置
function adding_custom_meta_boxes($post_type)
{
    switch ($post_type) {
        case 'post':
            add_meta_box('post_description', 'ディスクリプション', 'insert_post_description', 'post', 'normal', 'high', );
        case 'page':
            add_meta_box('post_description', 'ディスクリプション', 'insert_post_description', 'post', 'normal', 'high', );
            add_meta_box('frontpage_catchcopy', 'キャッチコピー', 'insert_frontpage_catchcopy', 'page', 'normal', 'high', );
            add_meta_box('frontpage_appeal', 'アピールポイント', 'insert_frontpage_appeal', 'page', 'normal', 'high', );
            add_meta_box('frontpage_greeting', 'ごあいさつ', 'insert_frontpage_greeting', 'page', 'normal', 'high', );
            add_meta_box('frontpage_service', 'サービスの特⻑', 'insert_frontpage_service', 'page', 'normal', 'high', );
            add_meta_box('frontpage_price_1', '料金表1', 'insert_frontpage_price', 'page', 'normal', 'high', );
            add_meta_box('frontpage_price_2', '料金表2', 'insert_frontpage_price_sub', 'page', 'normal', 'high', );
            add_meta_box('frontpage_price_3', '料金備考', 'insert_frontpage_price_other', 'page', 'normal', 'high', );
            add_meta_box('frontpage_step', '作業の流れ', 'insert_frontpage_step', 'page', 'normal', 'high', );
            add_meta_box('frontpage_about', '事業者案内', 'insert_frontpage_about', 'page', 'normal', 'high', );
            break;
        case 'works':
            add_meta_box('works_setting', '実績設定', 'insert_works_fields', 'works', 'normal', );
            break;
        case 'review':
            add_meta_box('custom_setting', '口コミ設定', 'insert_custom_fields', 'review', 'normal');
            break;
        case 'area':
            add_meta_box('area_setting', '対応エリア設定', 'insert_area_fields', 'area', 'normal');
            break;

        default:
            break;
    }
}
add_action('add_meta_boxes', 'adding_custom_meta_boxes');

// ディスクリプション
function insert_post_description()
{
    global $post;

    $post_description = get_post_meta($post->ID, 'post_description', true);

    echo <<<EOM
    <div class="custom--guroup">
    <textarea name="post_description" id="post_description" placeholder="150文字以内" style="widht:100%">$post_description</textarea>
    </div>
    EOM;
}

// キャッチコピー
function insert_frontpage_catchcopy()
{
    global $post;

    $catch_ttl = get_post_meta($post->ID, 'catch_ttl', true);
    $catch_txt = get_post_meta($post->ID, 'catch_txt', true);

    echo <<<EOM
    <div class="custom--guroup">
    <label class="custom--label" for="catch_ttl">タイトル</label>
    <input type="text" name="catch_ttl" value="$catch_ttl" class="custom--input" id="catch_ttl" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="catch_txt">本文</label>
    <textarea name="catch_txt" id="catch_txt" class="custom--input" placeholder="50文字以内">$catch_txt</textarea>
    </div>
    EOM;
}

// アピールポイント
function insert_frontpage_appeal()
{
    global $post;
    $appeal_1 = get_post_meta($post->ID, 'appeal_1', true);
    $appeal_2 = get_post_meta($post->ID, 'appeal_2', true);
    $appeal_3 = get_post_meta($post->ID, 'appeal_3', true);

    echo <<<EOM
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
    EOM;
}

// ごあいさつ
function insert_frontpage_greeting()
{
    global $post;
    $position = get_post_meta($post->ID, 'position', true);
    $position_name = get_post_meta($post->ID, 'position_name', true);
    $greeting = get_post_meta($post->ID, 'greeting', true);

    echo <<<EOM
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">役職</label>
    <input type="text" name="position" value="$position" class="custom--input" id="position" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">名前</label>
    <input type="text" name="position_name" value="$position_name" class="custom--input" id="position_name" placeholder="25文字以内" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="appeal_1">内容</label>
    <textarea name="greeting" id="greeting" class="custom--input" placeholder="50文字以内">$greeting</textarea>
    </div>
    EOM;
}

// サービスの特⻑
function insert_frontpage_service()
{
    global $post;
    $service_about =  get_post_meta($post->ID, 'service_about', true);
    wp_editor($service_about, 'service_about_box', [
        'textarea_name' => 'service_about'
    ]);
}

// サービスの料金
function insert_frontpage_price()
{
    global $post;
    $price_1 =  get_post_meta($post->ID, 'price_1', true);
    wp_editor($price_1, 'price_1_box', [
        'textarea_name' => 'price_1'
    ]);
}

// サービスの料金2
function insert_frontpage_price_sub()
{
    global $post;
    $price_2 =  get_post_meta($post->ID, 'price_2', true);
    wp_editor($price_2, 'price_2_box', [
        'textarea_name' => 'price_2'
    ]);
}

// サービスの備考
function insert_frontpage_price_other()
{
    global $post;
    $price_3 =  get_post_meta($post->ID, 'price_3', true);
    wp_editor($price_3, 'price_3_box', [
        'textarea_name' => 'price_3'
    ]);
}

// 作業の流れ
function insert_frontpage_step()
{
    global $post;
    $step_1_ttl = get_post_meta($post->ID, 'step_1_ttl', true);
    $step_1_txt = get_post_meta($post->ID, 'step_1_txt', true);
    $step_2_ttl = get_post_meta($post->ID, 'step_2_ttl', true);
    $step_2_txt = get_post_meta($post->ID, 'step_2_txt', true);
    $step_3_ttl = get_post_meta($post->ID, 'step_3_ttl', true);
    $step_3_txt = get_post_meta($post->ID, 'step_3_txt', true);
    $step_4_ttl = get_post_meta($post->ID, 'step_4_ttl', true);
    $step_4_txt = get_post_meta($post->ID, 'step_4_txt', true);

    echo <<<EOM
    <div class="custom--guroup">
    <label class="custom--label" for="step_1_ttl">STEP1タイトル</label>
    <input type="text" name="step_1_ttl" value="$step_1_ttl" class="custom--input" id="step_1_ttl" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_1_txt">STEP1本文</label>
    <input type="text" name="step_1_txt" value="$step_1_txt" class="custom--input" id="step_1_txt" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_2_ttl">STEP2タイトル</label>
    <input type="text" name="step_2_ttl" value="$step_2_ttl" class="custom--input" id="step_2_ttl" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_2_txt">STEP2本文</label>
    <input type="text" name="step_2_txt" value="$step_2_txt" class="custom--input" id="step_2_txt" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_3_ttl">STEP3タイトル</label>
    <input type="text" name="step_3_ttl" value="$step_3_ttl" class="custom--input" id="step_3_ttl" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_3_txt">STEP3本文</label>
    <input type="text" name="step_3_txt" value="$step_3_txt" class="custom--input" id="step_3_txt" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_4_ttl">STEP4タイトル</label>
    <input type="text" name="step_4_ttl" value="$step_4_ttl" class="custom--input" id="step_4_ttl" placeholder="" />
    </div>
    <div class="custom--guroup">
    <label class="custom--label" for="step_4_txt">STEP4本文</label>
    <input type="text" name="step_4_txt" value="$step_4_txt" class="custom--input" id="step_4_txt" placeholder="" />
    </div>
    EOM;
}

// 事業者案内
function insert_frontpage_about()
{
    global $post;
    $company_about =  get_post_meta($post->ID, 'company_about', true);
    wp_editor($company_about, 'company_about_box', [
        'textarea_name' => 'company_about'
    ]);
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

// カスタムフィールドの入力エリア（area）
function insert_area_fields()
{
    global $post;
    // エリア名
    $area_name = get_post_meta(
        $post->ID,
        'area_name',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="area_name">エリア名</label><input type="text" name="area_name" value="'.$area_name.'" class="custom--input" id="area_name" />';
    echo '</div>';
    // エリア詳細
    $area_text = get_post_meta(
        $post->ID,
        'area_text',
        true
    );
    echo '<div class="custom--guroup">';
    echo '<label class="custom--label" for="area_text">エリア詳細</label>';
    echo '<textarea class="custom--textarea" name="area_text" id="area_text" rows="8">'.$area_text.'</textarea>';
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

    if ($post_type === 'post') {
        if (isset($_POST['post_description'])) {
            update_post_meta($post_id, 'post_description', $_POST['post_description']);
        }
    }

    // トップページ
    if ($post_type === 'page') {
        if (isset($_POST['post_description'])) {
            update_post_meta($post_id, 'post_description', $_POST['post_description']);
        }
        if (isset($_POST['catch_ttl'])) {
            update_post_meta($post_id, 'catch_ttl', $_POST['catch_ttl']);
        }
        if (isset($_POST['catch_txt'])) {
            update_post_meta($post_id, 'catch_txt', $_POST['catch_txt']);
        }
        if (isset($_POST['appeal_1'])) {
            update_post_meta($post_id, 'appeal_1', $_POST['appeal_1']);
        }
        if (isset($_POST['appeal_2'])) {
            update_post_meta($post_id, 'appeal_2', $_POST['appeal_2']);
        }
        if (isset($_POST['appeal_3'])) {
            update_post_meta($post_id, 'appeal_3', $_POST['appeal_3']);
        }
        if (isset($_POST['position'])) {
            update_post_meta($post_id, 'position', $_POST['position']);
        }
        if (isset($_POST['position_name'])) {
            update_post_meta($post_id, 'position_name', $_POST['position_name']);
        }
        if (isset($_POST['greeting'])) {
            update_post_meta($post_id, 'greeting', $_POST['greeting']);
        }
        if (isset($_POST['service_about'])) {
            update_post_meta($post_id, 'service_about', $_POST['service_about']);
        }
        if (isset($_POST['price_1'])) {
            update_post_meta($post_id, 'price_1', $_POST['price_1']);
        }
        if (isset($_POST['price_2'])) {
            update_post_meta($post_id, 'price_2', $_POST['price_2']);
        }
        if (isset($_POST['price_3'])) {
            update_post_meta($post_id, 'price_3', $_POST['price_3']);
        }
        if (isset($_POST['step_1_ttl'])) {
            update_post_meta($post_id, 'step_1_ttl', $_POST['step_1_ttl']);
        }
        if (isset($_POST['step_1_txt'])) {
            update_post_meta($post_id, 'step_1_txt', $_POST['step_1_txt']);
        }
        if (isset($_POST['step_2_ttl'])) {
            update_post_meta($post_id, 'step_2_ttl', $_POST['step_2_ttl']);
        }
        if (isset($_POST['step_2_txt'])) {
            update_post_meta($post_id, 'step_2_txt', $_POST['step_2_txt']);
        }
        if (isset($_POST['step_3_ttl'])) {
            update_post_meta($post_id, 'step_3_ttl', $_POST['step_3_ttl']);
        }
        if (isset($_POST['step_3_txt'])) {
            update_post_meta($post_id, 'step_3_txt', $_POST['step_3_txt']);
        }
        if (isset($_POST['step_4_ttl'])) {
            update_post_meta($post_id, 'step_4_ttl', $_POST['step_4_ttl']);
        }
        if (isset($_POST['step_4_txt'])) {
            update_post_meta($post_id, 'step_4_txt', $_POST['step_4_txt']);
        }
        if (isset($_POST['company_about'])) {
            update_post_meta($post_id, 'company_about', $_POST['company_about']);
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

    // エリア
    if ($post_type === 'area') {
        if (isset($_POST['area_name'])) {
            update_post_meta($post_id, 'area_name', $_POST['area_name']);
        }
        if (isset($_POST['area_text'])) {
            update_post_meta($post_id, 'area_text', $_POST['area_text']);
        }
    }
}
add_action('save_post', 'save_custom_fields');
