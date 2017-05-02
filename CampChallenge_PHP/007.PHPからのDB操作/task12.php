<?php
  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);
  // ファイル名変更時はここを修正
  const THIS_FILE = 'task12.php';
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
<title>DB:複合検索</title>
</head>
<body>
    <h1>DB:複合検索</h1>

    <form action="<?php echo THIS_FILE; ?>" method="POST">
      <p>【name】</p>
      <input type="text" name="name" placeholder="例: 小松 菜奈">
      <p>【age】</p>
      <input type="text" name="age" placeholder="例: 21">
      <p>【birthday】</p>
      <input type="date" name="birthday" placeholder="例: 1996-02-16">
      <input type="submit" name="btnSubmit" value="検索">
    </form>


    <?php

      if (!isset($_POST['name'])) {
        echo "検索をかけたい情報を入力して検索ボタンを押してください<br>";
      } else {
        $search_str = array(
          // 'name' => $_POST['name'] == '' ? '.*' : $_POST['name'],
          // 'age' => $_POST['age'] == '' ? '.*' : $_POST['age'],
          // 'birthday' => $_POST['birthday'] == '' ? '.*' : $_POST['birthday']
          'name' => $_POST['name'] == '' ? null : $_POST['name'],
          'age' => $_POST['age'] == '' ? null : $_POST['age'],
          'birthday' => $_POST['birthday'] == '' ? null : $_POST['birthday']
        );

        if (empty(array_filter($search_str))) {
          echo "各検索情報が未入力です<br>";
          echo "1箇所以上の検索情報を入力してから検索ボタンを押してください<br>";
        } else {

          $search_flag = array();
          foreach ($search_str as $key => $value) {
            if (is_null($search_str[$key])) {
              $search_flag["$key"] = 0;
            } else {
              $search_flag["$key"] = 1;
            }
          }

          try {

            $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
            $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($search_flag['age'] == 1 && $search_flag['birthday'] == 1) {
              $query = $pdo_object->prepare("select * from profiles where name like :name and age = :age and birthday = :birthday");
              $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);
              $query->bindValue(':age', $search_str['age'], PDO::PARAM_STR);
              $query->bindValue(':birthday', $search_str['birthday'], PDO::PARAM_STR);

            } elseif ($search_flag['age'] == 1 && $search_flag['birthday'] == 0) {
              $query = $pdo_object->prepare("select * from profiles where name like :name and age = :age");
              $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);
              $query->bindValue(':age', $search_str['age'], PDO::PARAM_STR);

            } elseif ($search_flag['age'] == 0 && $search_flag['birthday'] == 1) {
              $query = $pdo_object->prepare("select * from profiles where name like :name and birthday = :birthday");
              $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);
              $query->bindValue(':birthday', $search_str['birthday'], PDO::PARAM_STR);

            } else {
              $query = $pdo_object->prepare("select * from profiles where name like :name");
              $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);

            }

            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
              echo "検索情報に一致するデータはありませんでした<br>";
              echo "（　name: ".$search_str['name']."　｜ age: ".$search_str['age']."　｜ birthday: ".$search_str['birthday']."　）<br>";
            } else {
              echo "検索結果を表示します<br>";
              echo "（　name: ".$search_str['name']."　｜ age: ".$search_str['age']."　｜ birthday: ".$search_str['birthday']."　）<br>";
              foreach ($result as $values) {
                echo "<br>";
                foreach ($values as $key => $value) {
                  echo $key.": ".$value."<br>";
                }
              }
            }

            $pdo_object＝null;

          } catch (PDOException $Exception) {
            die('DB接続に失敗しました: '.$Exception);
          }
        }
      }

    ?>

  </body>
  </html>
