<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div>

<div class="sidebar-inner">
<h3 class="sidebar-ttl">カテゴリー</h3>
<ul>
<li class="cat-item"><a href="<?php echo home_url(); ?>/works/">すべて</a></li>
<?php
$terms = get_terms('workscat');
foreach ($terms as $term): ?>
<li class="cat-item"><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>

<div class="sidebar-inner">
<h3 class="sidebar-ttl">アーカイブ</h3>
<ul class="side_menu">
<?php
$args = [
    'type' => 'monthly',
    'limit' => '',
    'format' => 'html',
    'before' => '',
    'after' => '',
    'show_post_count' => false,
    'echo' => 1,
    'order' => 'DESC',
    'post_type' => 'works'
];
wp_get_archives($args);
?>
</ul>
</div>
</div>
