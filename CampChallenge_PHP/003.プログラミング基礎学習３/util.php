<?php

  function profile() {
    echo '笠川陽介です。<br>';
    echo '1990年10月28日生まれです。<br>';
    echo '富士そばと小諸そばが好きです。<br><br>';
  }

  function oddeven ($number) {
    if ($number % 2 == 0) {
      echo '入力された数値'.$number.'は偶数です';
    } else {
      echo '入力された数値'.$number.'は奇数です';
    }
  }
