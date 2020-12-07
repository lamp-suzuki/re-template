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
<span><?php bloginfo('name'); ?></span>
</a>
</h2>
<p class="mb-0 mt-4 text-center">
<a href="<?php echo home_url().'/privacy-policy/'; ?>" class="text-body small">プライバシーポリシー</a>
</p>
</div>
<small class="copyright">©<?php echo date('Y'); ?> <?php echo bloginfo('name'); ?></small>
</footer>
<?php wp_footer(); ?>
</body>
</html>