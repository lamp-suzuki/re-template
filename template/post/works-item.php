<?php
/*
title:String
permalink:String
category:Object
time:date
content:String
*/

if ($thumbnail == null) {
    // thumbnailがない時
    $thumbnail = get_template_directory_uri()."/dist/images/slide_sample.png";
}
?>

<a href="<?php echo $permalink; ?>" class="post-list__item">
<div class="thumbnail">
<img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
</div>
<div>
<div class="meta text-body">
<span class="date"><?php echo $time; ?></span>
<?php if ($category->name != '' && $category->name != null): ?>
<span class="cat"><?php echo $category->name; ?></span>
<?php endif; ?>
</div>
<h3 class="ttl text-body"><?php echo $title; ?></h3>
<p class="excerpt text-body"><?php echo $content.'…'; ?></p>
</div>
</a>