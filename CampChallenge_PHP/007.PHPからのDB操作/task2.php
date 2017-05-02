<?php

  define('DB_DATABASE', 'challenge_db');
  define('DB_USERNAME', 'kasagawa');
  define('DB_PASSWORD', 'kasagawa');
  define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE . ';charset=utf8');

  try {

    $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 【profiles】へのレコード挿入
    $pdo_object->query("insert into profiles (profilesID, name, tell, age, birthday) values (99, '小松 菜奈', '090-9988-7766', 21, '1996-02-16')");

    // 【user】へのレコード挿入
    // $pdo_object->query("insert into profiles (userID, name, tell, age, birthday, departmentID, stationID) values (99, '宮崎 あおい', '090-5544-3322', 37, '1985-11-30', 99, 99)");

    // 【department】へのレコード挿入
    // $pdo_object->query("insert into profiles (departmentID, departmentName) values (99, '芸能部')");

    // 【station】へのレコード挿入
    // $pdo_object->query("insert into profiles (stationID, stationName) values (99, '目黒')");

    $pdo_object＝null;

  } catch (PDOException $Exception) {
    die('接続に失敗しました: '.$Exception);
  }
