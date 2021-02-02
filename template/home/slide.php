<?php
$slides = [];

if (wp_is_mobile()) {
    $prefex = 'sp';
} else {
    $prefex = 'pc';
}

for ($i=1; $i <= 5; $i++) {
    if (get_theme_mod("{$prefex}_slide_image_url_{$i}")) {
        $slides[] = get_theme_mod("{$prefex}_slide_image_url_{$i}");
    }
}

if (count($slides) > 0):
?>

<div class="home-slide__wrap">

<div class="home-slide">
<?php foreach ($slides as $index => $slide): ?>
<div class="home-slide__inner">
<img class="w-100" src="<?php echo $slide; ?>" alt="スライド<?php echo $index; ?>">
</div>
<?php endforeach; ?>
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

<?php endif; ?>