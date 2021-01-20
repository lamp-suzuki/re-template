<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php wp_head(); ?>

<?php if (get_theme_mod('body_color')): ?>
<style>body {color: <?php echo get_theme_mod('body_color'); ?>;}</style>
<?php endif; ?>
<?php if (get_theme_mod('primary_color')): ?>
<style>.page-item.active .page-link,.copyright,.badge-area.active,.cta__btns__list .btn.form,.home-slide .next-arrow, .home-slide .prev-arrow,.btn-primary {background-color: <?php echo get_theme_mod('primary_color'); ?> !important;border-color: <?php echo get_theme_mod('primary_color'); ?> !important;}.post-header .meta .cat,.step-home__inner .number,.review-home__box--header .icon,.post-list__item:after,.post-list__item .meta .cat {border-color: <?php echo get_theme_mod('primary_color'); ?> !important;}.post-header .meta .cat,.page--title h2,.drawer-menu .page_item>ul>li>a:before,.step-home__inner .number span,.badge-area,.table th, table th,.post-inner h2,.post-list__item .meta .cat,.cta__btns .heading__h2:after, .cta__btns .heading__h2:before,.heading__h2,.text-primary {color: <?php echo get_theme_mod('primary_color'); ?> !important;}.page-link,.page-link:hover,a {color: <?php echo get_theme_mod('primary_color'); ?>;}.drawer-menu .page_item>a:before, .drawer-menu .page_item>span:before {border-bottom: .7rem solid <?php echo get_theme_mod('primary_color'); ?>;}.badge-area.active{color: #ffffff !important;}</style>
<?php endif; ?>
<?php if (get_theme_mod('secondary_color')): ?>
<style>.cta__btns__list .btn.tel {background-color: <?php echo get_theme_mod('secondary_color'); ?> !important;border-color: <?php echo get_theme_mod('secondary_color'); ?> !important;}</style>
<?php endif; ?>

<?php
// headタグ出力
if (get_option('tag-head')) {
  echo get_option('tag-head');
} ?>
</head>

<body <?php body_class('drawer drawer--right'); ?>>
<?php wp_body_open(); ?>

<?php
// bodyスタートタグ
if (get_option('tag-body-start')) {
  echo get_option('tag-body-start');
} ?>

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
<a href="tel:<?php echo get_option('company-tel'); ?>" class="tel text-decoration-none">
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
<?php get_template_part('template/sp-menu'); ?>
</header>

<main id="main" role="main">
