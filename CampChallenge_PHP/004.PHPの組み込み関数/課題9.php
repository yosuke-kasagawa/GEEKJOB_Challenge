<?php

  $fp = fopen('課題9用ファイル.txt', 'r');
  while (!feof($fp)) {
    $get_text = fgets($fp);
    echo $get_text.'<br>';
  }

  // ◆もう一丁いくときは
  //   ポインタを先頭に戻してあげてから
  // rewind ($fp);
  // while (!feof($fp)) {
  //   $get_text = fgets($fp);
  //   echo $get_text.'<br>';
  // }

  fclose($fp);
