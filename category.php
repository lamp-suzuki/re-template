<?php get_header(); ?>
<div class="page--title">
<div class="container">
<h2>ブログ</h2>
</div>
</div>
<section class="sec">
<div class="container">
<div class="row">
<div class="col-lg-8 mb-lg-0 mb-5">
<h2 class="heading__h2 font-weight-normal"><?php single_cat_title(); ?></h2>
<div class="post-list">
<?php
if (have_posts()):
while (have_posts()): the_post();
set_query_var('title', get_the_title());
set_query_var('permalink', get_the_permalink());
set_query_var('category', get_the_category()[0]);
set_query_var('time', get_the_time('Y/m/d'));
set_query_var('content', wp_strip_all_tags(mb_substr(get_the_content(), 0, 120, 'UTF-8'), true));
get_template_part('template/post/list-item');
endwhile; endif; ?>
</div>
</div>
<!-- /col-md-8 -->
<div class="col-lg-4">
<?php get_sidebar(); ?>
</div>
<!-- /col-md-4 -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</section>
<!-- /mainsection -->

<?php get_footer();
