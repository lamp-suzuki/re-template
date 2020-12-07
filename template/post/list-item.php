<?php
/*
title:String
permalink:String
category:Object
time:date
content:String
*/
?>

<a href="<?php echo $permalink; ?>" class="post-list__item">
<div class="meta">
<span class="date"><?php echo $time; ?></span>
<span class="cat"><?php echo $category->name; ?></span>
</div>
<h3 class="ttl"><?php echo $title; ?></h3>
<p class="excerpt"><?php echo $content.'…'; ?></p>
</a>