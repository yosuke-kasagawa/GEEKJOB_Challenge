<?php

  $base = 0;
  $total = 0;

  for($times = $base; $times < 100; $times ++) {
    $total += $times;
  }
  $total += $times;

  echo '起点になる数は'.$base.'<br>'.'終点になる数は'.$times.'<br>'.'結果は'.$total;
