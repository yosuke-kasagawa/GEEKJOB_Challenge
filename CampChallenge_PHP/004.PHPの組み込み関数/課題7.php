<?php

  $base = 'きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます';
  $process1 = str_replace('I', 'い', $base);
  $process2 = str_replace('U', 'う', $process1);
  echo '処理前：'.$base.'<br>';
  echo '処理後：'.$process2.'<br>';
