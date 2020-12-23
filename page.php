<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); the_post(); ?>
<div class="page--title">
<div class="container">
<h2><?php the_title(); ?></h2>
</div>
</div>
<?php
// パンくず
get_theme_breadcrumb(); ?>
<section class="py-5">
<div class="container">
<div class="post-inner">
<?php the_content(); ?>
</div>
</div>
</section>
<?php get_footer();
