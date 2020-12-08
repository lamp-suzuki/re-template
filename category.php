<?php get_header(); ?>

<section class="py-5">
<div class="container">
<div class="row">
<div class="col-md-8">
<?php
if (have_posts()):
while (have_posts()): the_post(); ?>
<!-- ここに記事 -->
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
