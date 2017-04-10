<?php

  function profile() {
    echo '笠川陽介です。<br>';
    echo '1990年10月28日生まれです。<br>';
    echo '富士そばと小諸そばが好きです。<br><br>';
    return true;
  }

  $result = profile();
  if ($result) {
    echo 'この処理は正しく実行できました';
  } else {
    echo '正しく実行できませんでした';
  }
