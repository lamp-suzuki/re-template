<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div>

<div class="sidebar-inner"><h3 class="sidebar-ttl">カテゴリー</h3>
<ul>
<li class="cat-item"><a href="<?php echo home_url(); ?>/blog/">すべて</a></li>
<?php
// 親カテゴリーのものだけを一覧で取得
$args = array(
    'parent' => 0,
    'orderby' => 'term_order',
    'order' => 'ASC'
);
$categories = get_categories($args); ?>
<?php foreach ($categories as $category) : ?>
<li class="cat-item"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>

<?php if (is_active_sidebar('sidebar')) {
    dynamic_sidebar('sidebar');
} ?>
</div>
