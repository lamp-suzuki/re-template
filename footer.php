<div class="foot-cta border-top py-5">
<div class="container">
<?php
// cta
get_template_part('template/cta/buttons') ?>
</div>
</div>
<?php if (is_front_page()): ?>
<div class="pb-5">
<div class="container">
<p style="opacity: 0.7;font-size:10px"><?php echo nl2br(get_post_meta(get_the_ID(), 'seo_text', true)); ?></p>
</div>
</div>
<?php endif; ?>
</main>
<footer class="footer">
<div class="container py-5">
<h2 class="footer__logo">
<a href="<?php echo home_url(); ?>">
<?php if (get_the_logo_image_url() != null): ?>
<span>
<img style="max-width: 150px;max-height:50px" class="img-fluid" src="<?php echo get_the_logo_image_url(); ?>" alt="<?php bloginfo('name'); ?>">
</span>
<?php else: ?>
<span class="text-primary"><?php bloginfo('name'); ?></span>
<?php endif; ?>
</a>
</h2>
<p class="mb-0 mt-4 text-center">
<a href="<?php echo home_url().'/privacy-policy/'; ?>" class="text-body small">プライバシーポリシー</a>
</p>
</div>
<small class="copyright">©<?php echo date('Y'); ?> <?php echo get_option('company-name') ? get_option('company-name') : bloginfo('name'); ?></small>

<a href="#" class="totop">
<i class="fas fa-chevron-up text-white"></i>
</a>
</footer>

<?php if (wp_is_mobile()): ?>
<div class="sp-foot-menu">
<?php if (get_option('company-tel')): ?>
<a class="tel" href="tel:<?php echo get_option('company-tel'); ?>">
<span class="text-white bg-primary">電話で<br>相談する</span>
<span><i class="fas fa-phone-volume text-primary"></i><?php echo get_option('company-tel'); ?></span>
</a>
<?php endif; ?>
<?php if (get_option('company-line')): ?>
<a class="line" href="<?php echo get_option('company-line'); ?>" target="_blank"><span>LINEで<br>相談する</span></a>
</div>
<?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>

<?php
// bodyエンドタグ
if (get_option('tag-body-end')) {
  echo get_option('tag-body-end');
} ?>
</body>
</html>