<?php
  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);
  // ファイル名変更時はここを修正
  const THIS_FILE = 'task10.php';
  // エスケープ処理用
  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
  // DBとPDOの準備
  define('DB_DATABASE', 'challenge_db');
  define('DB_USERNAME', 'kasagawa');
  define('DB_PASSWORD', 'kasagawa');
  define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE . ';charset=utf8');
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>DB:データ削除</title>
</head>
<body>
    <h1>DB:データ削除</h1>

    <form action="<?php echo THIS_FILE; ?>" method="POST">
      <p>【profilesID】</p>
      <input type="text" name="profilesID" placeholder="例: 99">
      <input type="submit" name="btnSubmit" value="削除">
    </form>


    <?php

      if (!isset($_POST['profilesID'])) {
        echo "削除したいデータのIDを入力して削除ボタンを押してください<br>";
      } else {
        $input_ID = $_POST['profilesID'] == '' ? null : $_POST['profilesID'];

        if (empty($input_ID)) {
          echo "IDが未入力です<br>";
          echo "IDを入力してから削除ボタンを押してください<br>";
        } else {
          try {

            $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
            $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo_object->query("select profilesID from profiles");
            $all_ID_container = $query->fetchAll(PDO::FETCH_ASSOC);
            $all_ID = array();
            foreach ($all_ID_container as $ID_container) {
              $all_ID[] = $ID_container['profilesID'];
            }
            if (!in_array($input_ID, $all_ID, true)) {
              echo "該当するIDがありませんでした<br>";
            } else {

              $query = $pdo_object->prepare("select * from profiles where profilesID = ?");
              $query->execute([$input_ID]);
              $deleteRecord = $query->fetch(PDO::FETCH_ASSOC);
              echo "下記のデータ削除を実行します<br>";
              foreach($deleteRecord as $key => $value) {
                echo $key.": ".h($value)."<br>";
              }

              $query = $pdo_object->prepare("delete from profiles where profilesID = ?");
              $query->bindValue(1, $input_ID, PDO::PARAM_INT);
              $query->execute();
              echo "<br>削除が成功しました<br>";

              $query = $pdo_object->query("select * from profiles");
              $lastTable = $query->fetchAll(PDO::FETCH_ASSOC);
              echo "現在のテーブルを表示します<br>";
              foreach($lastTable as $record) {
                echo "<br>";
                foreach($record as $key => $value){
                  echo $key.": ".$value."<br>";
                }
              }
            }

            $pdo_object＝null;

          }catch (PDOException $Exception) {
            die('DB接続に失敗しました: '.$Exception);
          }
        }
      }


    ?>

  </body>
  </html>
