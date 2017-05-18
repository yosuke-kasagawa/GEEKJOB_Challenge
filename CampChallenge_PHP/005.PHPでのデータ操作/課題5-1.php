<?php

  session_start();

  $_SESSION['name'] = $_POST['name'];
  $_SESSION['sex'] = $_POST['sex'];
  $_SESSION['hobby'] = $_POST['hobby'];

  $name = $_SESSION['name'];
  $sex = $_SESSION['sex'];
  $hobby = $_SESSION['hobby'];

  echo '自己紹介が保存されました！<br>';
  echo 'TOP画面から【自己紹介を確認】を押してみよう！';
