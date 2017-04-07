<?php

  $base = $_GET['base'];
  $maxElement = $base;
  $elements = array();
  $dividedBy = 2;
  $stopper = 10;

  for ($dividedBy = 2; $dividedBy < $stopper; $dividedBy ++) {
    while ($maxElement % $dividedBy == 0) {
      $maxElement /= $dividedBy;
      $elements[] = $dividedBy;
    }
  }

  // ◆配列に$stopper以上の$maxElementを追加する時◆
  // if ($maxElement >= $stopper) {
  //   $elements[] = $maxElement;
  // }

  echo '入力された数は'.$base.'<br>';
  echo $stopper.'未満の素数で素因数分解を実施'.'<br>';
  if ($maxElement >= $stopper) {
    echo $stopper.'以上の素数またはその掛け合わせの数である因数が存在し、その数は'.$maxElement.'<br>';
  } else {
    echo $stopper.'以上の素数またはその掛け合わせの数である因数は存在しない'.'<br>';
  }

  echo $base.'に含まれる'.$stopper.'未満の素数は';
  foreach ($elements as $value) {
    echo $value.'、';
  }
  echo '以上の'.count($elements).'つである';


  // ◆お手軽確認用◆
  // echo "<PRE>";
  // print_r ($elements);
  // echo "<PRE>";
