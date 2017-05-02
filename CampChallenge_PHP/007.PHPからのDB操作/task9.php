<?php
  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);
  // ファイル名変更時はここを修正
  const THIS_FILE = 'task9.php';
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
<title>DB:データ挿入</title>
</head>
<body>
    <h1>DB:データ挿入</h1>

    <form action="<?php echo THIS_FILE; ?>" method="POST">
      <p>【profilesID】</p>
      <input type="text" name="profilesID" placeholder="例: 99">
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
        echo "データを入力して更新ボタンを押してください<br>";
      } else {
        $input_profiles = array(
          'profilesID' => $_POST['profilesID'] == '' ? null : $_POST['profilesID'],
          'name' => $_POST['name'] == '' ? null : $_POST['name'],
          'tell' => $_POST['tell'] == '' ? null : $_POST['tell'],
          'age' => $_POST['age'] == '' ? null : $_POST['age'],
          'birthday' => $_POST['birthday'] == '' ? null : $_POST['birthday']
        );

        // var_dump($input_profiles);
        if (empty(array_filter($input_profiles))) {
          echo "データが未入力です<br>";
          echo "データを入力してから更新ボタンを押してください<br>";
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
            // var_dump($all_ID);
            if (in_array($input_profiles['profilesID'], $all_ID, true)) {
              echo "入力したIDは既に存在します<br>";
              echo "別のIDを入力するか空欄のまま更新ボタンを押してください<br>";
              echo "（IDが未入力の場合は自動的にIDが割り振られます）<br>";
            } else {

              $query = $pdo_object->prepare("insert into profiles (profilesID, name, tell, age, birthday) values (:profilesID, :name, :tell, :age, :birthday)");
              $query->bindValue(':profilesID', $input_profiles['profilesID'], PDO::PARAM_INT);
              // var_dump($query->bindValue(':profilesID', $input_profiles['profilesID'], PDO::PARAM_INT));
              $query->bindValue(':name', $input_profiles['name'], PDO::PARAM_STR);
              $query->bindValue(':tell', $input_profiles['tell'], PDO::PARAM_STR);
              $query->bindValue(':age', $input_profiles['age'], PDO::PARAM_INT);
              $query->bindValue(':birthday', $input_profiles['birthday'], PDO::PARAM_STR);
              $query->execute();
              $lastID = $pdo_object->lastInsertId('profilesID');
              // var_dump($lastID);
              $query = $pdo_object->prepare("select * from profiles where profilesID = ?");
              $query->execute([$lastID]);
              $lastRecord = $query->fetch(PDO::FETCH_ASSOC);
              // var_dump($lastRecord);
              echo "下記のレコードを挿入しました<br>";
              // var_dump($lastRecord);
              // var_dump($lastRecord[0]);
              foreach($lastRecord as $key => $value) {
                echo $key.": ".h($value)."<br>";
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
