<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); the_post(); ?>
<div class="page--title">
<div class="container">
<h2><?php the_title(); ?></h2>
</div>
</div>

<div class="sec">
<div class="container">
<div class="cta__contact">
<div class="cta__btns__list">
<div class="pict">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/pic_contact.png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/pic_contact.png 1x, <?php echo get_template_directory_uri(); ?>/dist/images/pic_contact@2x.png 2x">
</div>
<a href="tel:" class="tel btn">
<i class="fas fa-phone-volume" style="font-size:2rem"></i>
<span>0120-00-0000</span>
</a>
<a href="#" target="_blank" class="line btn">
<i class="fab fa-line" style="font-size:2rem"></i>
<span>LINEで相談する</span>
</a>
</div>
</div>
<!-- .cta__contact -->
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
