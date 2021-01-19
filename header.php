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
<?php if (get_the_logo_image_url() != null): ?>
<span>
<img class="img-fluid" src="<?php echo get_the_logo_image_url(); ?>" alt="<?php bloginfo('name'); ?>">
</span>
<?php else: ?>
<span><?php bloginfo('name'); ?></span>
<?php endif; ?>
</a>
</h1>
<!-- .logo -->
<?php if (get_option('company-tel')): ?>
<a href="tel:<?php echo get_option('company-tel'); ?>" class="tel">
<i class="fas fa-phone-volume text-primary"></i>
<span><?php echo get_option('company-tel'); ?></span>
</a>
<!-- .tel -->
<?php endif; ?>
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
