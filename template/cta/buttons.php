<div class="cta__btns">
<h2 class="heading__h2">まずはお気軽にご相談ください</h2>
<div class="cta__btns__list">
<?php if (get_option('company-tel')): ?>
<a href="tel:<?php echo get_option('company-tel'); ?>" class="tel btn">
<i class="fas fa-phone-volume" style="font-size:2rem"></i>
<span><?php echo get_option('company-tel'); ?></span>
</a>
<?php endif; ?>
<a href="<?php echo home_url(); ?>/contact/" class="form btn">
<i class="fas fa-envelope" style="font-size:2rem"></i>
<span>ご相談フォーム</span>
</a>
<?php if (get_option('company-line')): ?>
<a href="<?php echo get_option('company-line'); ?>" target="_blank" class="line btn">
<i class="fab fa-line" style="font-size:2rem"></i>
<span>LINEで相談する</span>
</a>
<?php endif; ?>
</div>
</div>
<!-- .cta__btns -->