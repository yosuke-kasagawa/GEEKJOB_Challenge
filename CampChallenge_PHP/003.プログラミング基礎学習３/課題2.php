<?php

  function oddeven ($number) {
    if ($number % 2 == 0) {
      echo '入力された数値'.$number.'は偶数です';
    } else {
      echo '入力された数値'.$number.'は奇数です';
    }
  }

  oddeven(398752395);
