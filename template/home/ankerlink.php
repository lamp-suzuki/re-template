<?php
$links = [
  'ごあいさつ' => home_url().'#greeting',
  'ブログ' => home_url().'#blog',
  'サービスの特⻑' => home_url().'#service',
  '料金表' => home_url().'#price',
  '対応エリア' => home_url().'#area',
  '口コミ' => home_url().'#review',
  '作業実績' => home_url().'#works',
  '作業の流れ' => home_url().'#flow',
  'スタッフ紹介' => home_url().'#staff',
  'よくある質問' => home_url().'#faq',
  '事業者案内' => home_url().'#company',
];
?>
<div class="ankerlink d-flex justify-content-start align-items-start flex-wrap">
<?php foreach ($links as $ttl => $link) { ?>
<a href="<?php echo $link; ?>" class="bg-white btn">
<span class="d-block"><?php echo $ttl; ?></span>
<i class="fas fa-caret-down text-primary"></i>
</a>
<?php } ?>
</div>
<!-- .ankerlink -->