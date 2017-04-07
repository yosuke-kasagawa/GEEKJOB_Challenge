<?php

  $base = 8;
  $multiplier = 1;

  for($times = 0; $times < 20; $times ++) {
    $multiplier *= $base;
  }

  echo '掛ける数は'.$base.'<br>'.'掛ける回数は'.$times.'<br>'.'結果は'.$multiplier;
