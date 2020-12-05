<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<section class="py-5">
<div class="container">
<div class="row">
<div class="col-md-8">
<?php
if (have_posts()):
while (have_posts()): the_post(); ?>
<article>
<?php
$t = get_the_title();
$category = get_the_category();
$posttags = get_the_tags();
$thumbnail = get_the_post_thumbnail('large');
?>
</article>
<?php endwhile; endif; ?>
</div>
<!-- /col-md-8 -->
<div class="col-md-4">
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
