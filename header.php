<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class('drawer drawer--right'); ?>>
<?php wp_body_open(); ?>
<header role="banner" class="header">
<h1 class="logo">
<a href="<?php echo home_url(); ?>">
<span><?php bloginfo('name'); ?></span>
</a>
</h1>
<!-- .logo -->
<a href="tel:0120-00-0000" class="tel">
<i class="fas fa-phone-volume text-primary"></i>
<span>0120-00-0000</span>
</a>
<!-- .tel -->
<div class="contact">
<a href="<?php echo home_url(); ?>/contact/" class="btn btn-primary">
<i class="fas fa-envelope"></i>
<span>ご相談フォーム</span>
</a>
</div>
<!-- .contact -->
<button type="button" class="drawer-toggle drawer-hamburger">
<span class="drawer-hamburger-icon"></span>
<span class="drawer-hamburger__txt">MENU</span>
</button>
<!-- .drawer-toggle -->
<nav class="drawer-nav" role="navigation">
<ul class="drawer-menu">
<?php wp_list_pages('title_li='); ?>
</ul>
<div class="contact">
<a href="<?php echo home_url(); ?>/contact/" class="btn btn-primary">
<i class="fas fa-envelope"></i>
<span>ご相談フォーム</span>
</a>
</div>
</nav>
<!-- .drawer-nav -->
</header>
<main id="main" role="main">
