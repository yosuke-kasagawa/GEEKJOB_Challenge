<?php

  $fp = fopen('課題8用ファイル.txt', 'w');
  fwrite($fp, '笠川陽介です。'."\n");
  fwrite($fp, '1990年10月28日生まれです。'."\n");
  fwrite($fp, '富士そばと小諸そばが好きです。'."\n\n");
  fclose($fp);

  echo 'あなたがこれを読んでいるということは<br>';
  echo 'うまくいっている…はず<br>';
