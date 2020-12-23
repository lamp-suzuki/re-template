<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div>
<?php if (is_active_sidebar('sidebar-works')): ?>
<?php dynamic_sidebar('sidebar-works'); ?>
<?php endif; ?>
<div class="sidebar-inner">
<h3 class="sidebar-ttl">アーカイブ</h3>
<ul class="side_menu">
<?php
$args = [
    'type' => 'monthly',
    'format' => 'html',
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
