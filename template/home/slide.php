<div class="home-slide__wrap">

<div class="home-slide">
<?php for ($i=0; $i < 5; $i++) { ?>
<div class="home-slide__inner">
<img class="w-100" src="<?php echo get_template_directory_uri(); ?>/dist/images/slide_sample.png" alt="">
</div>
<?php } ?>
</div>

<div class="home-slide__counts">
<div class="container">
<div class="home-slide__nums">
<span class="current"></span>
<span>/</span>
<span class="all"></span>
</div>
</div>
</div>

<div class="home-slide__sns-link">
<div class="container">
<a href="<?php echo get_option('link-fb'); ?>" target="_blank" rel="nofollow">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_facebook.png" alt="フェイスブック" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_facebook.png 1x, <?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_facebook@2x.png 2x">
</a>
<a href="<?php echo get_option('link-insta'); ?>" target="_blank" rel="nofollow">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_instagram.png" alt="インスタグラム" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_instagram.png 1x, <?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_instagram@2x.png 2x">
</a>
<a href="<?php echo get_option('link-tw'); ?>" target="_blank" rel="nofollow">
<img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_twitter.png" alt="ツイッター" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_twitter.png 1x, <?php echo get_template_directory_uri(); ?>/dist/images/icon_sns_twitter@2x.png 2x">
</a>
</div>
</div>

</div>