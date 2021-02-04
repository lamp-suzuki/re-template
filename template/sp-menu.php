<?php
$links = [
  'ごあいさつ' => home_url().'#greeting',
  'サービスの特⻑' => home_url().'#service',
  '料金表' => home_url().'#price',
  '対応エリア' => home_url().'#area',
  '口コミ' => home_url().'#review',
  '作業の流れ' => home_url().'#flow',
  'スタッフ紹介' => home_url().'#staff',
  'よくある質問' => home_url().'#faq',
  '事業者案内' => home_url().'#company',
];
?>
<nav class="drawer-nav" role="navigation">
<ul class="drawer-menu">
<li class="page_item"><a href="<?php echo home_url(); ?>/">トップページ</a></li>
<li class="page_item">
<span>基本情報 <b class="text-primary">ー</b></span>
<ul>
<?php foreach ($links as $ttl => $link) { ?>
<li><a href="<?php echo $link; ?>"><?php echo $ttl; ?></a></li>
<?php } ?>
</ul>
</li>
<li class="page_item"><a href="<?php echo home_url(); ?>/blog/">ブログ</a></li>
<li class="page_item"><a href="<?php echo home_url(); ?>/works/">作業実績</a></li>
</ul>
<div class="contact border-top pt-3">
<a href="<?php echo home_url(); ?>/contact/" class="btn btn-primary">
<i class="fas fa-envelope"></i>
<span>ご相談フォーム</span>
</a>
</div>
</nav>
<!-- .drawer-nav -->
