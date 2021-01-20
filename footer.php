<div class="foot-cta border-top py-5">
<div class="container">
<?php
// cta
get_template_part('template/cta/buttons') ?>
</div>
</div>
</main>
<footer class="footer">
<div class="container py-5">
<h2 class="footer__logo">
<a href="<?php echo home_url(); ?>">
<?php if (get_the_logo_image_url() != null): ?>
<span>
<img class="img-fluid" src="<?php echo get_the_logo_image_url(); ?>" alt="<?php bloginfo('name'); ?>">
</span>
<?php else: ?>
<span><?php bloginfo('name'); ?></span>
<?php endif; ?>
</a>
</h2>
<p class="mb-0 mt-4 text-center">
<a href="<?php echo home_url().'/privacy-policy/'; ?>" class="text-body small">プライバシーポリシー</a>
</p>
</div>
<small class="copyright">©<?php echo date('Y'); ?> <?php echo get_option('company-name') ? get_option('company-name') : bloginfo('name'); ?></small>
</footer>
<?php wp_footer(); ?>

<?php
// bodyエンドタグ
if (get_option('tag-body-end')) {
  echo get_option('tag-body-end');
} ?>
</body>
</html>