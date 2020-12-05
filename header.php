<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
<nav class="site-header sticky-top py-1 bg-dark">
<div class="container d-flex flex-column flex-md-row">
<a class="py-2 text-white" href="#" aria-label="Product">LOGO</a>
<div class="ml-md-auto">
<a class="p-2 d-none d-md-inline-block text-white" href="#">Tour</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Product</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Features</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Enterprise</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Support</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Pricing</a>
<a class="p-2 d-none d-md-inline-block text-white" href="#">Cart</a>
</div>
</div>
</nav>
</header>
<!-- /header -->

<main>
