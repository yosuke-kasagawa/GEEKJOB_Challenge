<?php
  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);
  // ファイル名変更時はここを修正
  const THIS_FILE = 'task11.php';
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
<title>DB:データ更新</title>
</head>
<body>
    <h1>DB:データ更新</h1>

    <form action="<?php echo THIS_FILE; ?>" method="POST">
      <p>【profilesID】</p>
      <input type="text" name="profilesID" placeholder="例: 99">
      <p>・・・・・・・・</p>
      <p>【name】</p>
      <input type="text" name="name" placeholder="例: 小松 菜奈">
      <p>【tell】</p>
      <input type="tel" name="tell" placeholder="例: 050-5864-3600" pattern="\d{1,5}-\d{1,4}-\d{4,5}" title="電話番号は、市外局番からハイフン（-）を入れて記入してください。">
      <p>【age】</p>
      <input type="text" name="age" placeholder="例: 21">
      <p>【birthday】</p>
      <input type="date" name="birthday" placeholder="例: 1996-02-16">
      <input type="submit" name="btnSubmit" value="更新">
    </form>


    <?php

      if (!isset($_POST['profilesID'])) {
        echo "更新したいIDと更新内容を入力して更新ボタンを押してください<br>";
      } else {
        $input_ID = $_POST['profilesID'] == '' ? null : $_POST['profilesID'];

        if (empty($input_ID)) {
          echo "IDが未入力です<br>";
          echo "IDと更新内容を入力してから更新ボタンを押してください<br>";
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
              $oldRecord = $query->fetch(PDO::FETCH_ASSOC);
              echo "更新前のデータは下記です<br>";
              foreach($oldRecord as $key => $value) {
                echo $key.": ".h($value)."<br>";
              }

              $newRecord = array(
                'name' => $_POST['name'] == '' ? null : $_POST['name'],
                'tell' => $_POST['tell'] == '' ? null : $_POST['tell'],
                'age' => $_POST['age'] == '' ? null : $_POST['age'],
                'birthday' => $_POST['birthday'] == '' ? null : $_POST['birthday']
              );

              $query = $pdo_object->prepare("update profiles set name = :name, tell = :tell, age = :age, birthday = :birthday where profilesID = :profilesID");
              $query->bindValue(':profilesID', $input_ID, PDO::PARAM_INT);
              // $query->execute();
              $query->bindValue(':name', $newRecord['name'], PDO::PARAM_STR);
              $query->bindValue(':tell', $newRecord['tell'], PDO::PARAM_STR);
              $query->bindValue(':age', $newRecord['age'], PDO::PARAM_INT);
              $query->bindValue(':birthday', $newRecord['birthday'], PDO::PARAM_STR);
              $query->execute();
              echo "<br>更新が成功しました<br>";


              $query = $pdo_object->prepare("select * from profiles where profilesID = :profilesID");
              $query->bindValue(':profilesID', $input_ID, PDO::PARAM_STR);
              $query->execute();
              $updatedRecord = $query->fetch(PDO::FETCH_ASSOC);
              echo "更新されたデータを表示します<br>";
              foreach($updatedRecord as $key => $value) {
                echo $key.": ".$value."<br>";
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
