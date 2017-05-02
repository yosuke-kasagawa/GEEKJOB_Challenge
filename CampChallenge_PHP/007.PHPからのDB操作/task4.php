<?php

  define('DB_DATABASE', 'challenge_db');
  define('DB_USERNAME', 'kasagawa');
  define('DB_PASSWORD', 'kasagawa');
  define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE . ';charset=utf8');

  try {

    $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 【profiles】からprofilesID=1のレコードを取得/画面出力
    $query = $pdo_object->prepare("select * from profiles where profilesID = ?");
    $query->execute([1]);
    $profiles = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($profiles as $profile) {
      echo('<pre>');
      var_dump($profile);
      echo('<pre>');
    }

    $pdo_object＝null;

  } catch (PDOException $Exception) {
    die('接続に失敗しました: '.$Exception);
  }
