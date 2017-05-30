<?php
require_once '../common/defineUtil.php';

  //トップへのリンク作成
  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }

  //出力エスケープ処理
  function h($str) {
      return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
