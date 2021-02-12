<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div>

<div class="sidebar-inner"><h3 class="sidebar-ttl">カテゴリー</h3>
<ul>
<li class="cat-item"><a href="<?php echo home_url(); ?>/blog/">すべて</a></li>
<?php
// 親カテゴリーのものだけを一覧で取得
$args = [
    'parent' => 0,
    'orderby' => 'ID',
    'order' => 'ASC'
];
$cats = get_categories($args);
$args = [
    'child_of' => $cats[0]->term_id,
    'orderby' => 'ID',
    'order' => 'ASC'
];
$categories = get_categories($args);
foreach ($categories as $cat): ?>
<li class="cat-item"><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div>
