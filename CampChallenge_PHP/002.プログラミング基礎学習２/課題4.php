<?php

  $base = 'A';
  $connection = '';

  for($times = 0; $times < 30; $times ++) {
    $connection .= $base;
  }

  echo '繰り返す文字は【'.$base.'】<br>'.'繰り返す回数は'.$times.'<br>'.'結果は【'.$connection.'】';
