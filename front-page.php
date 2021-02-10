<?php
// header
get_header(); the_post(); ?>

<?php
// slides
get_template_part('template/home/slide'); ?>

<?php
$page_id = get_the_ID();
$catch_ttl = get_post_meta($page_id, 'catch_ttl', true);
$catch_txt = get_post_meta($page_id, 'catch_txt', true);
$appeal_1 = get_post_meta($page_id, 'appeal_1', true);
$appeal_2 = get_post_meta($page_id, 'appeal_2', true);
$appeal_3 = get_post_meta($page_id, 'appeal_3', true);
$position = get_post_meta($page_id, 'position', true);
$position_name = get_post_meta($page_id, 'position_name', true);
$greeting = get_post_meta($page_id, 'greeting', true);
$service_about =  get_post_meta($page_id, 'service_about', true);
$price_1 =  get_post_meta($page_id, 'price_1', true);
$price_2 =  get_post_meta($page_id, 'price_2', true);
$price_3 =  get_post_meta($page_id, 'price_3', true);
$step_1_ttl = get_post_meta($page_id, 'step_1_ttl', true);
$step_1_txt = get_post_meta($page_id, 'step_1_txt', true);
$step_2_ttl = get_post_meta($page_id, 'step_2_ttl', true);
$step_2_txt = get_post_meta($page_id, 'step_2_txt', true);
$step_3_ttl = get_post_meta($page_id, 'step_3_ttl', true);
$step_3_txt = get_post_meta($page_id, 'step_3_txt', true);
$step_4_ttl = get_post_meta($page_id, 'step_4_ttl', true);
$step_4_txt = get_post_meta($page_id, 'step_4_txt', true);
$company_about =  get_post_meta($page_id, 'company_about', true);
?>

<section class="sec pt-0">
<div class="container">
<div class="row">
<div class="col-lg-8">
<h2 class="heading__h2" style="font-size:160%"><?php echo $catch_ttl; ?></h2>
<p style="font-size:110%"><?php echo nl2br($catch_txt); ?></p>
</div>
<div class="col-lg-4">
<div class="review-top bg-light p-4 text-center">
<p class="review-top__count"><?php echo get_review_avg(); ?></p>
<p class="review-top__stars">
<?php
// 星の表示
get_review_stars(get_review_avg()); ?>
</p>
<p class="review-top__link">
<a href="#review">口コミ<?php echo number_format(get_review_counts()); ?>件</a>
</p>
</div>
</div>
</div>
<!-- .row -->
<div class="appeal-point my-lg-5 my-4">
<h2 class="heading__h2 text-center">アピールポイント</h2>
<ul class="m-0 list__check">
<?php if ($appeal_1): ?><li><?php echo $appeal_1; ?></li><?php endif; ?>
<?php if ($appeal_2): ?><li><?php echo $appeal_2; ?></li><?php endif; ?>
<?php if ($appeal_3): ?><li><?php echo $appeal_3; ?></li><?php endif; ?>
</ul>
</div>
<!-- .appeal-point -->

<?php
// cta
get_template_part('template/cta/buttons'); ?>

</div>
</section>

<section class="sec">
<div class="container">
<h2 class="heading__h2">基本情報<span class="text-body small"><small>（クリックで該当情報を確認できます）</small></span></h2>
<?php
// ankerlink
get_template_part('template/home/ankerlink'); ?>
</div>
</section>

<section id="greeting" class="sec">
<div class="container">
<h2 class="heading__h2">ごあいさつ</h2>
<div class="row">
<?php if (get_theme_mod('profile_pict_url')): ?>
<div class="col-lg-3">
<div class="img__circle">
<img src="<?php echo get_theme_mod('profile_pict_url'); ?>" alt="<?php echo $position_name ? $position_name : ''; ?>">
</div>
</div>
<?php endif; ?>
<div class="col-lg-9">
<h3 class="heading__h3">
<?php if ($position): ?>
<small class="d-block font-weight-bold"><?php echo $position; ?></small>
<?php endif; ?>
<span class="d-block"><?php echo $position_name ? $position_name : ''; ?></span>
</h3>
<p class="mb-0"><?php echo $greeting ? nl2br($greeting) : ''; ?></p>
</div>
</div>
</div>
</section>
<!-- #greeting -->

<section id="blog" class="sec">
<div class="container">
<h2 class="heading__h2">ブログ</h2>
<div class="post-list">
<?php
$posts = get_posts([
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);
foreach ($posts as $post) {
    setup_postdata($post);
    set_query_var('title', get_the_title());
    set_query_var('permalink', get_the_permalink());
    set_query_var('category', get_the_category()[0]);
    set_query_var('time', get_the_time('Y/m/d'));
    set_query_var('content', wp_strip_all_tags(mb_substr(get_the_content(), 0, 120, 'UTF-8'), true));
    get_template_part('template/post/list-item');
}
wp_reset_postdata();
?>
</div>
<!-- .post-list -->
<div class="more-btn text-right">
<a href="<?php echo home_url(); ?>/blog/">もっと見る</a>
</div>
<!-- .more-btn -->
</div>
</section>
<!-- #blog -->

<section id="service" class="sec">
<div class="container">
<h2 class="heading__h2">サービスの特⻑</h2>
<div class="post-inner">
<div class="row mb-4">
<?php if (get_theme_mod('service_picts_url1')): ?>
<div class="col-md mb-md-0 mb-3">
<img src="<?php echo get_theme_mod('service_picts_url1'); ?>" alt="サービスの特⻑">
</div>
<?php endif; ?>
<?php if (get_theme_mod('service_picts_url2')): ?>
<div class="col-md">
<img src="<?php echo get_theme_mod('service_picts_url2'); ?>" alt="サービスの特⻑">
</div>
<?php endif; ?>
</div>
<?php echo $service_about; ?>
</div>
<!-- .post-inner -->
</div>
</section>
<!-- #service -->

<section id="price" class="sec">
<div class="container">
<h2 class="heading__h2">料金表</h2>
<div class="row">
<div class="col-lg-6 mb-lg-0 mb-4">
<h3>基本料金</h3>
<?php echo $price_1; ?>
</div>
<div class="col-lg-6">
<h3>オプション料金</h3>
<?php echo $price_2; ?>
<h3 class="mt-4">備考</h3>
<p class="mb-0 bg-white p-4 border"><?php echo nl2br(strip_tags($price_3)); ?></p>
</div>
</div>
<!-- .row -->
</div>
</section>
<!-- #price -->

<section id="area" class="sec">
<div class="container">
<h2 class="heading__h2">対応エリア</h2>
<div class="d-flex justify-content-start align-items-center flex-wrap mb-3">

<?php
$areas = get_posts([
    'posts_per_page' => -1,
    'post_type' => 'area',
    'orderby' => 'ID',
    'order' => 'ASC',
]);
$area_array = [];
foreach ($areas as $area) {
    setup_postdata($area);
    $area_array[] = [
        'ttl' => get_post_meta($area->ID, 'area_name', true),
        'txt' => get_post_meta($area->ID, 'area_text', true),
    ];
}
?>

<?php foreach ($area_array as $key => $val): ?>
<div class="badge-area mb-lg-3 mb-2 mr-lg-3 mr-2 <?php echo $key == 0 ? "active" : ''; ?>" data-id="<?php echo ($key+1); ?>"><?php echo $val['ttl']; ?></div>
<?php endforeach; ?>
</div>
<!-- .badge-area -->
<p class="m-0">
<?php foreach ($area_array as $key => $val): ?>
<span class="<?php echo $key == 0 ? "active" : ''; ?> area-text" data-areaid="<?php echo ($key+1); ?>" style="display: none;"><?php echo $val['txt']; ?></span>
<?php endforeach; ?>
</p>
</div>
</section>
<!-- #area -->

<section id="review" class="sec">
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-5">
<h2 class="heading__h2 mb-0">口コミ</h2>
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

<div class="review-home">
<?php
$reviews = get_posts([
    'posts_per_page' => 4,
    'post_type' => 'review',
]);
foreach ($reviews as $review):
setup_postdata($review);
if (get_post_meta($review->ID, 'review_icon', true) == 0) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_man.png";
} elseif (get_post_meta($review->ID, 'review_icon', true) == 1) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_woman.png";
} elseif (get_post_meta($review->ID, 'review_icon', true) == 2) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_old_man.png";
} elseif (get_post_meta($review->ID, 'review_icon', true) == 3) {
    $review_icon = get_template_directory_uri()."/dist/images/icon_old_woman.png";
}
?>
<div class="review-home__box">
<div class="review-home__box--header">
<div class="icon">
<img src="<?php echo $review_icon; ?>" alt="<?php echo get_post_meta($review->ID, 'customer_name', true); ?>">
</div>
<div class="info">
<div>
<span class="name"><?php echo get_post_meta($review->ID, 'customer_name', true); ?>｜<?php echo get_post_meta($review->ID, 'works_genre', true); ?></span>
<span class="time"><?php the_time('Y年n月'); ?></span>
</div>
<div class="star">
<div class="text-warning">
<?php
// 星の表示
get_review_stars(get_post_meta($review->ID, 'stars', true)); ?>
</div>
<div class="num"><?php echo get_post_meta($review->ID, 'stars', true); ?></div>
</div>
</div>
</div>
<div class="review-home__box--body">
<p class="mb-0"><?php echo nl2br(get_post_meta($review->ID, 'review_content', true)); ?></p>
</div>
</div>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
</div>
<div class="more-btn text-right">
<a href="<?php echo home_url(); ?>/review/">もっと見る</a>
</div>
</div>
</section>
<!-- #review -->

<section id="works" class="sec">
<div class="container">
<h2 class="heading__h2">作業実績</h2>
<div class="post-list works-list">
<?php
$posts = get_posts([
    'posts_per_page' => 3,
    'post_type' => 'works',
]);
foreach ($posts as $post) {
    setup_postdata($post);
    set_query_var('title', get_the_title());
    set_query_var('permalink', get_the_permalink());
    set_query_var('category', get_the_terms(get_the_ID(), 'workscat')[0]);
    set_query_var('time', get_the_time('Y/m/d'));
    set_query_var('content', wp_strip_all_tags(mb_substr(get_the_content(), 0, 120, 'UTF-8'), true));
    if (wp_is_mobile()) {
        set_query_var('thumbnail', get_the_post_thumbnail_url(get_the_ID(), 'medium'));
    } else {
        set_query_var('thumbnail', get_the_post_thumbnail_url(get_the_ID(), 'large'));
    }
    get_template_part('template/post/works-item');
}
wp_reset_postdata();
?>
</div>
<!-- .post-list -->
<div class="more-btn text-right">
<a href="<?php echo home_url(); ?>/works/">もっと見る</a>
</div>
<!-- .more-btn -->
</div>
</section>
<!-- #works -->

<section id="flow" class="sec">
<div class="container">
<h2 class="heading__h2">作業の流れ</h2>
<div class="step-home">
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>01</span>
</div>
<div class="text">
<h3><?php echo $step_1_ttl; ?></h3>
<p><?php echo $step_1_txt; ?></p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>02</span>
</div>
<div class="text">
<h3><?php echo $step_2_ttl; ?></h3>
<p><?php echo $step_2_txt; ?></p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>03</span>
</div>
<div class="text">
<h3><?php echo $step_3_ttl; ?></h3>
<p><?php echo $step_3_txt; ?></p>
</div>
</div>
<!-- .step-home__inner -->
<div class="step-home__inner">
<div class="number">
<span>STEP</span>
<span>04</span>
</div>
<div class="text">
<h3><?php echo $step_4_ttl; ?></h3>
<p><?php echo $step_4_txt; ?></p>
</div>
</div>
<!-- .step-home__inner -->
</div>
<!-- .step-home -->
</div>
</section>
<!-- #flow -->

<!-- スタッフ紹介 -->
<?php
$staffs_args = [
    'posts_per_page' => -1,
    'post_type' => 'staff',
];
$staffs = get_posts($staffs_args);
if (is_array($staffs) && count($staffs) > 0): ?>
<section id="staff" class="sec">
<div class="container">
<h2 class="heading__h2">スタッフ紹介</h2>
<div class="staff-home">
<?php
foreach ($staffs as $staff):
setup_postdata($staff);
$id = $staff->ID;
$name = get_the_title($id);
?>
<div class="staff-home__box">
<?php if (has_post_thumbnail($id)): ?>
<div class="thumbnail">
<?php if (wp_is_mobile()): ?>
<img src="<?php echo get_the_post_thumbnail_url($id, 'medium'); ?>" alt="<?php echo $name; ?>">
<?php else: ?>
<img src="<?php echo get_the_post_thumbnail_url($id, 'large'); ?>" alt="<?php echo $name; ?>">
<?php endif ?>
</div>
<?php endif; ?>
<div class="text">
<h3 class="name"><?php echo $name; ?></h3>
<p><?php echo strip_tags(strip_shortcodes(get_the_content())); ?></p>
</div>
</div>
<!-- .staff-home__box -->
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
</div>
<!-- .staff-home -->
</div>
</section>
<!-- #staff -->
<?php endif; ?>
<!-- スタッフ紹介 -->

<?php
$faqs_args = [
    'posts_per_page' => -1,
    'post_type' => 'faq',
];
$faqs = get_posts($faqs_args);
if (is_array($faqs) && count($faqs) > 0): ?>
<section id="faq" class="sec">
<div class="container">
<h2 class="heading__h2">よくある質問</h2>
<div class="faq">
<?php
foreach ($faqs as $index => $faq):
setup_postdata($faq);
$id = $faq->ID;
?>
<div class="faq__box <?php echo $index == 0 ? 'active' : ''; ?>">
<h3>
<span>
<span class="text-primary font-weight-bold mr-3">Q</span>
<span><?php echo get_the_title($id); ?></span>
</span>
</h3>
<div <?php echo $index == 0 ? 'style="display: block;"' : ''; ?>>
<div>
<span class="font-weight-bold mr-3">A</span>
<span><?php echo strip_tags(strip_shortcodes(get_the_content())); ?></span>
</div>
</div>
</div>
<!-- .faq__box -->
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
</div>
</div>
</section>
<!-- #faq -->
<?php endif; ?>

<section id="company" class="sec">
<div class="container">
<h2 class="heading__h2">事業者案内</h2>
<?php echo $company_about; ?>

<div class="row mt-4">
<div class="col-md">
<div class="embed-responsive embed-responsive-4by3">
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.827853398534!2d139.76493611520053!3d35.68124053757898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1612346091127!5m2!1sja!2sjp"></iframe>
</div>
</div>
<div class="col-md mt-md-0 mt-4">
<div class="embed-responsive embed-responsive-4by3">
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!4v1612346316119!6m8!1m7!1sFprQtWX1aNhPgxW1vzj6CQ!2m2!1d35.68114190583712!2d139.7671619642916!3f205.82950039533677!4f0!5f0.7820865974627469"></iframe>
</div>
</div>
</div>
</div>
</section>
<!-- #company -->

<?php
// footer
get_footer();
