<?php

  session_start();

  if ($_SESSION["LastLoginDate"] != NULL) {
    echo '保存中の自己紹介はこちら！<br><br>';
    echo '【名前】<br>'.$_SESSION['name'].'<br><br>';
    echo '【性別】<br>'.$_SESSION['sex'].'<br><br>';
    echo '【趣味】<br>'.$_SESSION['hobby'].'<br>';
  } else {
    echo '保存記録がありません。';
  }
