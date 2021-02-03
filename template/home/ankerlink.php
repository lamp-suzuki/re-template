<?php
$links = [
  'ごあいさつ' => '#greeting',
  'ブログ' => '#blog',
  'サービスの特⻑' => '#service',
  '料金表' => '#price',
  '対応エリア' => '#area',
  '口コミ' => '#review',
  '作業実績' => '#works',
  '作業の流れ' => '#flow',
  'スタッフ紹介' => '#staff',
  'よくある質問' => '#faq',
  '事業者案内' => '#company',
];
?>
<div class="ankerlink d-flex justify-content-start align-items-start flex-wrap">
<?php foreach ($links as $ttl => $link) { ?>
<a href="<?php echo $link; ?>" class="bg-white btn">
<span class="d-block text-body"><?php echo $ttl; ?></span>
<i class="fas fa-caret-down text-primary"></i>
</a>
<?php } ?>
</div>
<!-- .ankerlink -->