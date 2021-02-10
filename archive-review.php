<?php get_header(); ?>
<div class="page--title">
<div class="container">
<h2>口コミ</h2>
</div>
</div>
<?php
// パンくず
get_theme_breadcrumb(); ?>
<section class="sec">
<div class="container">

<div class="text-right">
<div class="d-inline-flex">
<div class="text-warning mr-3">
<?php
// 星の表示
get_review_stars(get_review_avg()); ?>
</div>
<div class="font-weight-bold d-inline-flex align-items-center" style="font-size: 120%;">
<span><?php echo get_review_avg(); ?></span>
<span class="mx-2">|</span>
<span><?php echo number_format(get_review_counts()); ?>件</span>
</div>
</div>
</div>

<div class="review-home review-archives">
<?php
if (have_posts()):
while (have_posts()): the_post();
if (get_post_meta(get_the_ID(), 'review_icon', true) == 0) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_man.png";
} elseif (get_post_meta(get_the_ID(), 'review_icon', true) == 1) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_woman.png";
} elseif (get_post_meta(get_the_ID(), 'review_icon', true) == 2) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_old_man.png";
} elseif (get_post_meta(get_the_ID(), 'review_icon', true) == 3) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_old_woman.png";
}
?>
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo $review_icon; ?>" alt="<?php echo get_post_meta(get_the_ID(), 'customer_name', true); ?>">
</div>
<div class="info">
<div>
<span class="name"><?php echo get_post_meta(get_the_ID(), 'customer_name', true); ?>｜<?php echo get_post_meta(get_the_ID(), 'works_genre', true); ?></span>
<span class="time"><?php the_time('Y年n月'); ?></span>
</div>
<div class="star">
<div class="text-warning">
<?php
// 星の表示
get_review_stars(get_post_meta(get_the_ID(), 'stars', true)); ?>
</div>
<div class="num"><?php echo get_post_meta(get_the_ID(), 'stars', true); ?></div>
</div>
</div>
</div>
<div class="review-home__box--body">
<p class="mb-0"><?php echo nl2br(get_post_meta(get_the_ID(), 'review_content', true)); ?></p>
</div>
</div>
<?php endwhile; endif; ?>
</div>
<?php
// ページネーション
if (function_exists('pagenation')) {
    pagenation();
} ?>

<div class="text-center mt-4">
<a class="btn btn-primary" href="<?php echo home_url(); ?>">トップに戻る</a>
</div>

</div>
<!-- /container -->
</section>
<!-- /mainsection -->

<?php get_footer();
