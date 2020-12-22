<?php

// テーマディレクトリ
define('DIRECTORY', get_template_directory());

// 基本設定
require DIRECTORY.'/lib/functions/common-setting.php';

// アセットの読み込み
require DIRECTORY.'/lib/functions/resources.php';

// 管理画面のカスタマイズ
require DIRECTORY.'/lib/functions/admin.php';

// カスタム投稿の追加
require DIRECTORY.'/lib/functions/custom-posts.php';
