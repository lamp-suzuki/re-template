<?php

// 管理パネルならテーマ設定メニューを配置します。
if (is_admin()) {
    add_action('admin_menu', 'add_reeight_menu');
    add_action('admin_menu', 'add_reeight_submenu');
    add_action('admin_init', 'register_reeight_settings');
}

/**
 * テーマ用の設定メニューを管理メニューに追加します。
 */
function add_reeight_menu()
{
    add_menu_page(
        'テーマ設定', // メニューページのタイトル文字列
        'テーマ設定', // メニュー文字列
        'manage_options', // メニューの表示権限
        'reeight-settings', // メニューのスラグ(URLのパス)
        'create_reeight_settings_page', // メニューページの表示用の関数
    );
}


function add_reeight_submenu()
{
    // add_submenu_page('reeight-settings', 'タグ管理画面', 'タグ管理', 'manage_options', 'custom_submenu_page_1', 'add_custom_menu_page_1', 1);
    add_submenu_page('reeight-settings', '設定マニュアル', '設定マニュアル', 'manage_options', 'theme_manual', 'create_theme_manual', 2);
}


/**
 * テーマ用の設定値を作成します。
 */
function register_reeight_settings()
{
    // 会社情報
    register_setting('reeight-settings', 'company-name'); // 会社名
    register_setting('reeight-settings', 'company-email'); // 会社メールアドレス
    register_setting('reeight-settings', 'company-tel'); // 会社電話
    register_setting('reeight-settings', 'company-line'); // 会社LINE

    // プロフィール
    register_setting('reeight-settings', 'job-title'); // 役職名
    register_setting('reeight-settings', 'officer-name'); // 代表者名
    register_setting('reeight-settings', 'officer-greeting'); // あいさつ
    register_setting('reeight-settings', 'officer-pict'); // 代表写真
}

/**
 * テーマ設定ページを描画します。
 */
function create_reeight_settings_page()
{
    ?>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<div class="wrap">

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item mb-0" role="presentation">
<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">会社情報</a>
</li>
<li class="nav-item mb-0" role="presentation">
<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">プロフィール</a>
</li>
</ul>

<form class="p-3 pb-0 bg-white rounded-bottom border border-1 border-top-0" method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
<?php
settings_fields('reeight-settings');
    do_settings_sections('reeight-settings'); ?>

<div class="tab-content" style="max-width: 768px;">

<div class="pt-4 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<h3 class="fw-bold h4 mb-4">会社情報</h3>

<div class="mb-4 row">
<label for="company-name" class="fw-bold col-sm-3 col-form-label">会社名</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="company-name" name="company-name"  placeholder="株式会社〇〇〇〇" value="<?php echo get_option('company-name'); ?>">
</div>
</div>

<div class="mb-4 row">
<label for="company-email" class="fw-bold col-sm-3 col-form-label">メールアドレス</label>
<div class="col-sm-9">
<input type="email" class="form-control" id="company-email" name="company-email"  placeholder="info@example.com" value="<?php echo get_option('company-email'); ?>">
</div>
</div>

<div class="mb-4 row">
<label for="company-tel" class="fw-bold col-sm-3 col-form-label">電話番号</label>
<div class="col-sm-9">
<input type="tel" class="form-control" id="company-tel" name="company-tel" placeholder="000-000-0000" value="<?php echo get_option('company-tel'); ?>">
</div>
</div>

<div class="mb-4 row">
<label for="company-line" class="fw-bold col-sm-3 col-form-label">LINE友達追加URL</label>
<div class="col-sm-9">
<input type="url" class="form-control" id="company-line" name="company-line" placeholder="https://line.me/ti/p/〇〇〇〇" value="<?php echo get_option('company-line'); ?>">
</div>
</div>

<!-- <div class="mb-3 pt-3">
<h3 class="hndle"><span>セレクトボックス</span></h3>
<div class="inside">
<div class="main">
<p class="setting_description">セレクトボックスを選択してください。</p>
<h4>セレクトボックス</h4>
<select name="select" id="select">
<option value="0" <?php selected(0, get_option('select')); ?> >選択してください</option>
<option value="1" <?php selected(1, get_option('select')); ?> >セレクトボックス1</option>
<option value="2" <?php selected(2, get_option('select')); ?> >セレクトボックス2</option>
<option value="3" <?php selected(3, get_option('select')); ?> >セレクトボックス3</option>
</select>
</div>
</div>
</div> -->

<!-- <div class="mb-3 pt-3">
<h3 class="hndle"><span>ラジオボタン</span></h3>
<div class="inside">
<div class="main">
<p class="setting_description">ラジオボタンを選択してください。</p>
<h4>ラジオボタン</h4>
<ul>
<li><label><input name="radio" type="radio" value="0" <?php checked(0, get_option('radio')); ?> />ラジオボタン0</label></li>
<li><label><input name="radio" type="radio" value="1" <?php checked(1, get_option('radio')); ?> />ラジオボタン1</label></li>
<li><label><input name="radio" type="radio" value="2" <?php checked(2, get_option('radio')); ?> />ラジオボタン2</label></li>
<li><label><input name="radio" type="radio" value="3" <?php checked(3, get_option('radio')); ?> />ラジオボタン3</label></li>
</ul>
</div>
</div>
</div> -->

</div>

<div class="pt-4 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

<h3 class="fw-bold h4 mb-4">代表者設定</h3>

<div class="mb-4 row my-uploader">
<label for="officer-pict" class="fw-bold col-sm-3 col-form-label">プロフィール写真</label>
<div class="col-sm-9">
<?php generate_upload_image_tag('officer-pict', get_option('officer-pict')); ?>
</div>
</div>

<div class="mb-4 row">
<label for="job-title" class="fw-bold col-sm-3 col-form-label">役職名</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="job-title" name="job-title" placeholder="代表取締役" value="<?php echo get_option('job-title'); ?>">
</div>
</div>

<div class="mb-4 row">
<label for="officer-name" class="fw-bold col-sm-3 col-form-label">氏名</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="officer-name" name="officer-name" placeholder="山田 太郎" value="<?php echo get_option('officer-name'); ?>">
</div>
</div>

<div class="mb-4 row">
<label for="officer-greeting" class="fw-bold col-sm-3 col-form-label">あいさつ</label>
<div class="col-sm-9">
<textarea class="form-control" id="officer-greeting" name="officer-greeting" cols="30" rows="10"><?php echo get_option('officer-greeting'); ?></textarea>
</div>
</div>

</div>

</div>

<?php submit_button(); ?>

</form>
</div>

<?php
}

// マニュアルページ
function create_theme_manual()
{ ?>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<div class="wrap">
<h2 class="fw-bold mb-4">設定マニュアル</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item mb-0" role="presentation"><a class="nav-link active" id="basic-tab" data-bs-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">基本設定</a></li>
<li class="nav-item mb-0" role="presentation"><a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">お問い合わせ設定</a></li>
</ul>

<div class="tab-content p-3 pb-0 bg-white rounded-bottom border border-1 border-top-0">

<div class="pt-4 tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">

<div class="mb-5">
<h3 class="fw-bold h5">1. 固定ページの作成</h3>
<p>固定ページの新規追加より以下のページを作成</p>
<table class="table table-sm">
<thead class="table-light">
<tr>
<th>ページタイトル</th>
<th>パーマリンク</th>
</tr>
</thead>
<tbody>
<tr>
<td>トップページ</td>
<td><code>top</code></td>
</tr>
<tr>
<td>ご相談フォーム</td>
<td><code>contact</code></td>
</tr>
<tr>
<td>ブログ</td>
<td><code>blog</code></td>
</tr>
<tr>
<td>プライバシーポリシー</td>
<td><code>privacy-policy</code></td>
</tr>
</tbody>
</table>
</div>

<div class="mb-5">
<h3 class="fw-bold h5">2. 表示設定</h3>
<p>「設定」の「表示設定」より「<b>ホームページの表示</b>」を「<b>固定ページ</b>」に変更。</p>
<ul>
<li>ホームページ：<code>トップページ</code></li>
<li>投稿ページ：<code>ブログ</code></li>
</ul>
</div>

<div class="mb-5">
<h3 class="fw-bold h5">3. パーマリンク設定</h3>
<p>「設定」の「パーマリンク設定」より「カスタム構造」を選択。内容を「<code>/%category%/%postname%/</code>」に変更し保存。</p>
</div>

</div>

<div class="pt-4 tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<div class="mb-5">
<h3 class="fw-bold h5">1. プラグインのインストール</h3>
<p>プラグインより<code>Contact Form 7</code>をインストール。</p>
</div>
<div class="mb-5">
<h3 class="fw-bold h5">2. お問い合わせフォームの作成</h3>
<p>「お問い合わせ」設定よりフォームを選択。下記内容をコピーしてフォームの内容にペーストしてください。</p>
<pre class="d-block p-2 rounded bg-light">
<code class="bg-light">&lt;label class="must"&gt;お名前&lt;/label&gt;
[text* your-name class:form-control]
&lt;label class="must"&gt;所在地&lt;/label&gt;
&lt;div class="row"&gt;
&lt;div class="col"&gt;
&lt;label&gt;都道府県&lt;/label&gt;
[select* your-pref class:form-control "北海道" "青森県" "岩手県" "宮城県" "秋田県" "山形県" "福島県" "茨城県" "栃木県" "群馬県" "埼玉県" "千葉県" "東京都" "神奈川県" "新潟県" "富山県" "石川県" "福井県" "山梨県" "長野県" "岐阜県" "静岡県" "愛知県" "三重県" "滋賀県" "京都府" "大阪府" "兵庫県" "奈良県" "和歌山県" "鳥取県" "島根県" "岡山県" "広島県" "山口県" "徳島県" "香川県" "愛媛県" "高知県" "福岡県" "佐賀県" "長崎県" "熊本県" "大分県" "宮崎県" "鹿児島県" "沖縄県"]
&lt;/div&gt;
&lt;div class="col"&gt;
&lt;label&gt;市区町村&lt;/label&gt;
[text* your-address class:form-control]
&lt;/div&gt;
&lt;/div&gt;
&lt;label class="must"&gt;お電話番号&lt;/label&gt;
[tel* your-tel class:form-control]
&lt;label class="must"&gt;メールアドレス&lt;/label&gt;
[email* your-email class:form-control]
&lt;label class="must"&gt;ご相談項目&lt;/label&gt;
[radio your-subject use_label_element default:1 "相談・質問" "見積り依頼" "作業依頼" "その他"]
&lt;label class="must"&gt;ご相談内容&lt;/label&gt;
[textarea* your-message class:form-control]
&lt;label class="must"&gt;&lt;a href="/privacy-policy/"&gt;プライバシーポリシー&lt;/a&gt;に同意&lt;/label&gt;
[acceptance acceptance-privacy class:form-check-input] 同意する [/acceptance]
&lt;div class="confirm-box"&gt;
[acceptance acceptance-confirm class:form-check-input][/acceptance]
&lt;span class="confirm"&gt;確認画面は表示されませんので、上記内容でよろしければチェックのうえ、&lt;br&gt;下記送信ボタンを押してください。&lt;/span&gt;
&lt;/div&gt;
&lt;div class="text-center mt-5"&gt;
[submit class:btn class:btn-primary "送信する"]
&lt;/div&gt;</code>
</pre>
</div>
</div>

</div>
<?php
}


//画像アップロード用のタグを出力する
function generate_upload_image_tag($name, $value)
{
    ?>
<input name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" class="form-control d-inline-block w-auto align-middle" />
<input type="button" name="<?php echo $name; ?>_slect" value="選択" class="btn btn-primary align-middle mx-1" />
<input type="button" name="<?php echo $name; ?>_clear" value="クリア" class="btn btn-light align-middle" />
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail mt-2">
<?php if ($value): ?>
<img class="img-thumbnail" src="<?php echo $value; ?>" alt="選択中の画像" width="200">
<?php endif ?>
</div>
<script>
(function ($) {
  var custom_uploader;
  $("input:button[name=<?php echo $name; ?>_slect]").click(function(e) {
    e.preventDefault();
    if (custom_uploader) {
      custom_uploader.open();
      return;
    }
    custom_uploader = wp.media({
      title: "画像を選択してください",
      library: {
        type: "image"
      },
      button: {
        text: "画像の選択"
      },
      multiple: false
    });
    custom_uploader.on("select", function() {
      var images = custom_uploader.state().get("selection");
      images.each(function(file){
        $("input:text[name=<?php echo $name; ?>]").val("");
        $("#<?php echo $name; ?>_thumbnail").empty();
        $("input:text[name=<?php echo $name; ?>]").val(file.attributes.sizes.full.url);
        $("#<?php echo $name; ?>_thumbnail").append('<img class="img-thumbnail" width="200" src="'+file.attributes.sizes.full.url+'" />');
      });
    });
    custom_uploader.open();
  });
  $("input:button[name=<?php echo $name; ?>_clear]").click(function() {
    $("input:text[name=<?php echo $name; ?>]").val("");
    $("#<?php echo $name; ?>_thumbnail").empty();
  });
})(jQuery);
</script>
<?php
}

function load_media_files()
{
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_media_files');