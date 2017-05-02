<?php
  // ファイル名変更時はここを修正
  const THIS_FILE = 'task8.php';

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
<title>DB検索</title>
</head>
<body>
    <h1>DB検索</h1>
    <form action="<?php echo THIS_FILE; ?>" method="POST">
      <input type="text" name="word">
      <input type="submit" name="btnSubmit" value="検索">
    </form>

    <?php

      $search_word = $_POST['word'];

      if ( !(is_null($search_word)) ) {

        if (strlen($search_word) == 0) {
          echo '<br>検索ワードを入力してください<br>';
        } else {

          try {

            $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
            $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 【profiles】のnameが検索ワードと部分一致するのレコードを表示
            $query = $pdo_object->prepare("select * from profiles where name like ?");
            $query->execute(['%'.$search_word.'%']);
            $profiles = $query->fetchAll(PDO::FETCH_ASSOC);

            if (count($profiles) == 0) {
              echo '<br>一致する名前はありませんでした<br>';
            } else {
              echo '<br>一致する名前が'.count($profiles).'件ありました<br>';
              foreach ($profiles as $i => $profile) {
                echo '<br>';
                foreach ($profile as $key => $value) {
                  echo $key.': '.$value;
                  echo '<br>';
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
