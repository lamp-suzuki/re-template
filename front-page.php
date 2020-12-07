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
<div class="review-home bg-light p-4 text-center">
<p class="review-home__count">4</p>
<p class="review-home__stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="far fa-star"></i>
</p>
<p class="review-home__link">
<a href="#">口コミ50件</a>
</p>
</div>
</div>
</div>
<!-- .row -->
<div class="appeal-point p-3 border my-md-5 my-4">
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
<div class="col-md-3">
<div class="img__circle">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/greeting_sample.png" alt="">
</div>
</div>
<div class="col-md-9">
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
<div class="more-btn text-right">
<a href="<?php echo home_url().'/blog/' ?>">もっと見る</a>
</div>
</div>
</section>
<!-- #blog -->

<section id="service" class="sec">
<div class="container">
<h2 class="heading__h2">サービスの特⻑</h2>
</div>
</section>
<!-- #service -->

<section id="price" class="sec">
<div class="container">
<h2 class="heading__h2">料金表</h2>
</div>
</section>
<!-- #price -->

<section id="area" class="sec">
<div class="container">
<h2 class="heading__h2">対応エリア</h2>
</div>
</section>
<!-- #area -->

<section id="review" class="sec">
<div class="container">
<h2 class="heading__h2">口コミ</h2>
</div>
</section>
<!-- #review -->

<section id="works" class="sec">
<div class="container">
<h2 class="heading__h2">作業実績</h2>
</div>
</section>
<!-- #works -->

<section id="flow" class="sec">
<div class="container">
<h2 class="heading__h2">作業の流れ</h2>
</div>
</section>
<!-- #flow -->

<section id="staff" class="sec">
<div class="container">
<h2 class="heading__h2">スタッフ紹介</h2>
</div>
</section>
<!-- #staff -->

<section id="faq" class="sec">
<div class="container">
<h2 class="heading__h2">よくある質問</h2>
</div>
</section>
<!-- #faq -->

<section id="company" class="sec">
<div class="container">
<h2 class="heading__h2">事業者案内</h2>
</div>
</section>
<!-- #company -->

<?php
// footer
get_footer();
