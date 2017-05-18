<?
// 提出時は下記を「 1 -> 0 」に
ini_set('display_errors', 0);
?>


<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">

<head>
  <title>【自己紹介アプリ】</title>
</head>

<body>

<h1>【自己紹介アプリ】</h1>

<form action="課題1.php" method="post">
  <p>◆名前</p>
    <input type="text" name="name"><br>
  <p>◆性別</p>
    <input type="radio" name="sex" value="男性" checked="checked">男性
    <input type="radio" name="sex" value="女性">女性<br>
  <p>◆趣味</p>
    <textarea name="hobby" cols="50" rows="10"></textarea><br>
  <input type="submit" value="自己紹介を表示"><br>
</form>

<?php

  if (isset($_POST['name'])) {
    echo '<br><br>【名前】<br>'.$_POST['name'];
  }

  if (isset($_POST['name'])) {
    echo '<br><br>【性別】<br>'.$_POST['sex'];
  }

  if (isset($_POST['name'])) {
    echo '<br><br>【趣味】<br>'.$_POST['hobby'];
  }
  // $name = $_POST['name'];
  // $sex = $_POST['sex'];
  // $hobby = $_POST['hobby'];
  // function self_introduction ($name, $sex, $hobby) {
  //   echo '<br><br>【名前】<br>'.$name.'<br><br>'.'【性別】<br>'.$sex.'<br><br>'.'【趣味】<br>'.$hobby.'<br>';
  // }
  // self_introduction($name, $sex, $hobby);
?>

</body>
</html>
