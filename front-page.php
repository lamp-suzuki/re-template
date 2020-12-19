<?php
// header
get_header(); ?>

<?php
// slides
get_template_part('template/home/slide'); ?>

<section class="sec pt-0">
<div class="container">
<div class="row">
<div class="col-lg-8">
<h2 class="heading__h2">キャッチコピー<br>キャッチコピーキャッチコピー(25文字以内)</h2>
<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、(50文字以内)</p>
</div>
<div class="col-lg-4">
<div class="review-top bg-light p-4 text-center">
<p class="review-top__count">4</p>
<p class="review-top__stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="far fa-star"></i>
</p>
<p class="review-top__link">
<a href="#">口コミ50件</a>
</p>
</div>
</div>
</div>
<!-- .row -->
<div class="appeal-point p-3 border my-lg-5 my-4">
<h2 class="heading__h2 text-center">アピールポイント</h2>
<ul class="m-0 list__check">
<li>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(25文字以内)</li>
<li>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(25文字以内)</li>
<li>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(25文字以内)</li>
</ul>
</div>
<!-- .appeal-point -->

<?php
// cta
get_template_part('template/cta/buttons'); ?>

</div>
</section>

<section class="sec">
<div class="container">
<h2 class="heading__h2">基本情報<span class="text-body">(クリックで該当情報を確認できます)</span></h2>
<?php
// ankerlink
get_template_part('template/home/ankerlink'); ?>
</div>
</section>

<section id="greeting" class="sec">
<div class="container">
<h2 class="heading__h2">ごあいさつ</h2>
<div class="row">
<div class="col-lg-3">
<div class="img__circle">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
</div>
<div class="col-lg-9">
<h3 class="heading__h3">
<small class="d-block font-weight-bold">店長</small>
<span class="d-block">山本 太郎</span>
</h3>
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、(200文字以内)</p>
</div>
</div>
</div>
</section>
<!-- #greeting -->

<section id="blog" class="sec">
<div class="container">
<h2 class="heading__h2">ブログ</h2>
<div class="post-list">
<?php
$posts = get_posts([
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);
foreach ($posts as $post) {
    setup_postdata($post);
    set_query_var('title', get_the_title());
    set_query_var('permalink', get_the_permalink());
    set_query_var('category', get_the_category()[0]);
    set_query_var('time', get_the_time('Y/m/d'));
    set_query_var('content', wp_strip_all_tags(mb_substr(get_the_content(), 0, 120, 'UTF-8'), true));
    get_template_part('template/post/list-item');
}
wp_reset_postdata();
?>
</div>
<!-- .post-list -->
<div class="more-btn text-right">
<a href="<?php echo home_url().'/blog/' ?>">もっと見る</a>
</div>
<!-- .more-btn -->
</div>
</section>
<!-- #blog -->

<section id="service" class="sec">
<div class="container">
<h2 class="heading__h2">サービスの特⻑</h2>
<div class="post-inner">
<div class="row mb-3">
<div class="col">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/slide_sample.png" alt="">
</div>
<div class="col">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/slide_sample.png" alt="">
</div>
</div>
<p>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。
<br>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。(500文字以内)</p>
<hr>
<h2>見出し2デザイン</h2>
<p>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。
<br>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。</p>
<h3>見出し3デザイン</h3>
<p>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。
<br>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。</p>
<div class="post-box bg-light p-4">
<h4 class="mt-0">見出し4デザイン</h4>
<p class="mb-0">この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。
<br>この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。この文章は文字の大きさ文字数などを確認するためのダミー文章です。</p>
</div>
</div>
<!-- .post-inner -->
</div>
</section>
<!-- #service -->

<section id="price" class="sec">
<div class="container">
<h2 class="heading__h2">料金表</h2>
<div class="row">
<div class="col-lg-6 mb-lg-0 mb-4">
<h3>基本料金</h3>
<table class="table">
<tbody>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
</tbody>
</table>
</div>
<div class="col-lg-6">
<h3>オプション料金</h3>
<table class="table">
<tbody>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
</tbody>
</table>
<h3 class="mt-4">備考</h3>
<p class="mb-0 bg-white p-4 border">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。(200文字以内)</p>
</div>
</div>
<!-- .row -->
</div>
</section>
<!-- #price -->

<section id="area" class="sec">
<div class="container">
<h2 class="heading__h2">対応エリア</h2>
<div class="d-flex justify-content-start align-items-center flex-wrap mb-3">
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2 active" data-id="1">北海道</div>
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2" data-id="2">北海道</div>
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2" data-id="3">北海道</div>
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2" data-id="4">北海道</div>
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2" data-id="5">北海道</div>
</div>
<!-- .badge-area -->
<p class="m-0">
<span class="active area-text" data-areaid="1" style="display: none;">札幌市/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/</span>
<span class="area-text" data-areaid="2" style="display: none;">2/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/</span>
<span class="area-text" data-areaid="3" style="display: none;">3/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/</span>
<span class="area-text" data-areaid="4" style="display: none;">4/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/</span>
<span class="area-text" data-areaid="5" style="display: none;">5/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/テキスト/</span>
</p>
</div>
</section>
<!-- #area -->

<section id="review" class="sec">
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-5">
<h2 class="heading__h2 mb-0">口コミ</h2>
<div class="d-inline-flex">
<div class="text-warning mr-3">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="font-weight-bold d-inline-flex align-items-center">
<span>5</span>
<span class="mx-2">|</span>
<span>50件</span>
</div>
</div>
</div>

<div class="review-home">
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_man.png" alt="男性">
</div>
<div class="info">
<div>
<span class="name">⼭田太郎さん｜不用品回収</span>
<span class="time">2020年10月</span>
</div>
<div class="star">
<div class="text-warning">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="num">5</div>
</div>
</div>
</div>
<!-- .review-home__box--header -->
<div class="review-home__box--body">
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。(200文字以内)</p>
</div>
</div>
<!-- .review-home__box -->
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_woman.png" alt="男性">
</div>
<div class="info">
<div>
<span class="name">⼭田太郎さん｜不用品回収</span>
<span class="time">2020年10月</span>
</div>
<div class="star">
<div class="text-warning">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="num">5</div>
</div>
</div>
</div>
<!-- .review-home__box--header -->
<div class="review-home__box--body">
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。(200文字以内)</p>
</div>
</div>
<!-- .review-home__box -->
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_old_man.png" alt="男性">
</div>
<div class="info">
<div>
<span class="name">⼭田太郎さん｜不用品回収</span>
<span class="time">2020年10月</span>
</div>
<div class="star">
<div class="text-warning">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="num">5</div>
</div>
</div>
</div>
<!-- .review-home__box--header -->
<div class="review-home__box--body">
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。(200文字以内)</p>
</div>
</div>
<!-- .review-home__box -->
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_old_woman.png" alt="男性">
</div>
<div class="info">
<div>
<span class="name">⼭田太郎さん｜不用品回収</span>
<span class="time">2020年10月</span>
</div>
<div class="star">
<div class="text-warning">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="num">5</div>
</div>
</div>
</div>
<!-- .review-home__box--header -->
<div class="review-home__box--body">
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。(200文字以内)</p>
</div>
</div>
<!-- .review-home__box -->
</div>
<!-- .review-home -->
</div>
</section>
<!-- #review -->

<section id="works" class="sec">
<div class="container">
<h2 class="heading__h2">作業実績</h2>
<div class="post-list works-list">
<?php
$posts = get_posts([
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);
foreach ($posts as $post) {
    setup_postdata($post);
    set_query_var('title', get_the_title());
    set_query_var('permalink', get_the_permalink());
    set_query_var('category', get_the_category()[0]);
    set_query_var('time', get_the_time('Y/m/d'));
    set_query_var('content', wp_strip_all_tags(mb_substr(get_the_content(), 0, 120, 'UTF-8'), true));
    set_query_var('thumbnail', get_the_post_thumbnail_url(get_the_ID(), 'large'));
    get_template_part('template/post/works-item');
}
wp_reset_postdata();
?>
</div>
<!-- .post-list -->
<div class="more-btn text-right">
<a href="<?php echo home_url().'/blog/' ?>">もっと見る</a>
</div>
<!-- .more-btn -->
</div>
</section>
<!-- #works -->

<section id="flow" class="sec">
<div class="container">
<h2 class="heading__h2">作業の流れ</h2>
<div class="step-home">
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>01</span>
</div>
<div class="text">
<h3>お電話もしくはフォームにてお問い合わせ</h3>
<p>お電話もしくはご相談フォームからお気軽にお問い合わせください。</p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>02</span>
</div>
<div class="text">
<h3>お電話もしくはフォームにてお問い合わせ</h3>
<p>お電話もしくはご相談フォームからお気軽にお問い合わせください。</p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>03</span>
</div>
<div class="text">
<h3>お電話もしくはフォームにてお問い合わせ</h3>
<p>お電話もしくはご相談フォームからお気軽にお問い合わせください。</p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>04</span>
</div>
<div class="text">
<h3>お電話もしくはフォームにてお問い合わせ</h3>
<p>お電話もしくはご相談フォームからお気軽にお問い合わせください。</p>
</div>
</div>
<!-- .step-home__inner -->
</div>
<!-- .step-home -->
</div>
</section>
<!-- #flow -->

<section id="staff" class="sec">
<div class="container">
<h2 class="heading__h2">スタッフ紹介</h2>
<div class="staff-home">
<div class="staff-home__box">
<div class="thumbnail">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
<div class="text">
<h3 class="name">山田 太郎</h3>
<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(50文字以内)</p>
</div>
</div>
<!-- .staff-home__box -->
<div class="staff-home__box">
<div class="thumbnail">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
<div class="text">
<h3 class="name">山田 太郎</h3>
<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(50文字以内)</p>
</div>
</div>
<!-- .staff-home__box -->
<div class="staff-home__box">
<div class="thumbnail">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
<div class="text">
<h3 class="name">山田 太郎</h3>
<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。(50文字以内)</p>
</div>
</div>
<!-- .staff-home__box -->
</div>
<!-- .staff-home -->
</div>
</section>
<!-- #staff -->

<section id="faq" class="sec">
<div class="container">
<h2 class="heading__h2">よくある質問</h2>
<div class="faq">
<div class="faq__box">
<h3>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</h3>
<div>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</div>
</div>
<!-- .faq__box -->
<div class="faq__box">
<h3>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</h3>
<div>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</div>
</div>
<!-- .faq__box -->
<div class="faq__box">
<h3>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</h3>
<div>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</div>
</div>
<!-- .faq__box -->
</div>
</div>
</section>
<!-- #faq -->

<section id="company" class="sec">
<div class="container">
<h2 class="heading__h2">事業者案内</h2>
<div class="row">
<div class="col-lg-3 col-4">
<div class="img__circle">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
</div>
<div class="col-lg-9 col-8">
<h3 class="heading__h3">
<small class="d-block font-weight-bold">店長</small>
<span class="d-block">山本 太郎</span>
</h3>
<p class="mb-0">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、(200文字以内)</p>
</div>
</div>
<table class="table table--normal mt-5">
<tbody>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
<tr>
<th>テキスト</th>
<td>1,000円</td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- #company -->

<?php
// footer
get_footer();
