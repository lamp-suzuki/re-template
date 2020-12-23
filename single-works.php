<?php get_header(); ?>
<div class="page--title">
<div class="container">
<h2>ブログ</h2>
</div>
</div>

<?php
// パンくず
get_theme_breadcrumb(); ?>

<section class="sec">
<div class="container">
<div class="row">
<div class="col-lg-8 mb-lg-0 mb-5">
<?php
$title = get_the_title();
$permalink = get_the_permalink();
$category_name = get_the_terms(get_the_ID(), 'workscat')[0]->name;
$time = get_the_time('Y/m/d');
?>
<header class="post-header">
<div class="meta">
<span class="date"><?php echo $time; ?></span>
<?php if ($category_name != '' && $category_name != null): ?>
<span class="cat"><?php echo $category_name; ?></span>
<?php endif; ?>
</div>
<h2><?php echo $title; ?></h2>
<?php if (get_the_post_thumbnail_url(get_the_ID(), 'large') != null): ?>
<figure>
<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo $title; ?>">
</figure>
<?php endif; ?>
</header>

<article class="post-inner mt-5">
<div class="mb-4">
<table class="table table--normal">
<tbody>
<tr>
<th>作業場所</th>
<td><?php echo get_post_meta(get_the_ID(), 'works_place', true); ?></td>
</tr>
<tr>
<th>作業時間</th>
<td><?php echo get_post_meta(get_the_ID(), 'works_time', true); ?></td>
</tr>
<tr>
<th>作業人数</th>
<td><?php echo get_post_meta(get_the_ID(), 'works_workers', true); ?></td>
</tr>
<tr>
<th>作業料金</th>
<td><?php echo get_post_meta(get_the_ID(), 'works_price', true); ?></td>
</tr>
</tbody>
</table>
</div>

<?php the_content(); ?>
</article>

<footer class="post-footer">
<div class="sns-share">
<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" class="facebook color-fb" target="_blank">
<i class="fab fa-facebook"></i>
</a>
<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" rel="nofollow" class="twitter color-tw" target="_blank">
<i class="fab fa-twitter"></i>
</a>
<a href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" class="line color-line" target="_blank">
<i class="fab fa-line"></i>
</a>
</div>
<div class="text-center">
<a class="btn-back" href="<?php echo home_url(); ?>/blog/">一覧へ戻る</a>
</div>
</footer>

</div>
<!-- /col-md-8 -->
<div class="col-lg-4">
<?php get_sidebar('works'); ?>
</div>
<!-- /col-md-4 -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</section>
<!-- /mainsection -->

<?php get_footer();
