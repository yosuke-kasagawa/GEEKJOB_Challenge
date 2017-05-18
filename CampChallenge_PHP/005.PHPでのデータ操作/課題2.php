<?php

  $access_time = date('Y年m月d日 H時i分s秒');
  setcookie('LastLoginDate', $access_time);

  $lastDate = $_COOKIE['LastLoginDate'];

  echo '笠川商店へようこそ<br>';
  echo '前回のログインは、'.$lastDate.'です';
