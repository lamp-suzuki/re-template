<div class="cta__btns">
<h2 class="heading__h2">まずはお気軽にご相談ください</h2>
<?php if (get_option('company-tel')): ?>
<div class="cta--tel">
<span>電話で<br class="d-md-none">相談する</span>
<a href="tel:<?php echo get_option('company-tel'); ?>" class="tel text-decoration-none">
<i class="fas fa-phone-volume text-primary"></i>
<span><?php echo get_option('company-tel'); ?></span>
</a>
</div>
<?php endif; ?>
<div class="cta--sub">
<a href="<?php echo home_url(); ?>/contact/">
<i class="fas fa-envelope text-primary mr-2"></i>
<span class="text-body">ネットで見積り・相談をする(無料)</span>
</a>
<?php if (get_option('company-line')): ?>
<a class="line" href="<?php echo get_option('company-line'); ?>" target="_blank">
<i class="fab fa-line mr-2 text-success"></i>
<span class="text-body">LINEで相談する</span>
</a>
<?php endif; ?>
</div>
</div>
<!-- .cta__btns -->