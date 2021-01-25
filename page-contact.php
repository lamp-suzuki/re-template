<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); the_post(); ?>
<div class="page--title">
<div class="container">
<h2><?php the_title(); ?></h2>
</div>
</div>
<?php get_theme_breadcrumb(); ?>
<div class="sec">
<div class="container">
<div class="cta__contact">
<div class="pict">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/pic_contact.png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/pic_contact.png 1x, <?php echo get_template_directory_uri(); ?>/dist/images/pic_contact@2x.png 2x">
</div>
<div class="cta__btns">
<?php if (get_option('company-tel')): ?>
<div class="cta--tel">
<span>電話で<br>相談する</span>
<a href="tel:<?php echo get_option('company-tel'); ?>" class="tel text-decoration-none">
<i class="fas fa-phone-volume text-primary"></i>
<span><?php echo get_option('company-tel'); ?></span>
</a>
</div>
<?php endif; ?>
<?php if (get_option('company-line')): ?>
<div class="cta--sub">
<a class="line" href="<?php echo get_option('company-line'); ?>" target="_blank">
<i class="fab fa-line mr-2 text-success"></i>
<span class="text-body">LINEで<br class="d-md-inline d-none">相談する</span>
</a>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
<div class="sec pt-0">
<div class="container">
<p class="font-weight-bold text-center">下記フォームの必要事項をご入力の上、送信ボタンでお問い合わせください。</p>
<p class="text-center small">※お送りいただいた情報については折り返しのご連絡以外の目的に使用致しません。
<br>お問い合わせ頂いた内容に対してのみご連絡させて頂きます。</p>
<div class="post-inner bg-light p-lg-5 p-4 mt-5">
<?php the_content(); ?>
</div>
</div>
</div>
<?php get_footer();
