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
get_template_part('template/cta/buttons') ?>

</div>
</section>

<section class="sec">
<div class="container">
<h2 class="heading__h2">基本情報<span class="text-body">(クリックで該当情報を確認できます)</span></h2>
</div>
</section>

<?php
// footer
get_footer();
