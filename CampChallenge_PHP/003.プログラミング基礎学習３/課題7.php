<?php

  $global_num = 3;

  function container () {
    global $global_num;
    static $local_num = 0;
    $global_num *= 2;
    $local_num ++;
    echo $local_num.'回目の実行<br>';
    echo '結果：'.$global_num.'<br><br>';
  }

  for ($i = 0; $i < 20; $i ++) {
    container();
  }
