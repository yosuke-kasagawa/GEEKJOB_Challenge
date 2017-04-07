<?php

  $base = 1000;
  $dividedBy = 2;
  $stopper = 100;
  $divided = $base;

  while ($divided >= $stopper) {
    $divided /= $dividedBy;
  }

  echo '割られる数は'.$base.'<br>'.'割る数は'.$dividedBy.'<br>'.'ストップする条件は'.$stopper.'未満になったとき'.'<br>'.'結果は'.$divided;
