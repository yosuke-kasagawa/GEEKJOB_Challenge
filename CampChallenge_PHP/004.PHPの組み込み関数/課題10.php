<?php

  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);

  // エラーログ取得用に設定
  date_default_timezone_set('Asia/Tokyo');

  // おみくじアプリ結果表示用
  $your_name = '';

  // 進数変換アプリ用
  $base_num = null;

  // おみくじアプリ実行関数
  function fortune_cookie($your_name) {
    $rand_num = mt_rand(-1, 51);
    $message = null;
    if ($rand_num == 51) {
      $message = $your_name.'さんへ。<br>あなたは超人的な豪運です。<br>あなたなら鷲巣様とも渡り合えるでしょう。<br>';
    } elseif ($rand_num >= 40) {
      $message = $your_name.'さんへ。<br>あなたはなかなかな強運です。<br>ギャンブラーとしての進路も検討してみてください。<br>';
    } elseif ($rand_num >= 30) {
      $message = $your_name.'さんへ。<br>あなたはそこそこの良運です。<br>5000円程度の宝くじなら当選できるでしょう。<br>';
    } elseif ($rand_num == 25) {
      $message = $your_name.'さんへ。<br>あなたは恐ろしく中庸な運です。<br>あなたの人生は快晴の大海のごとく凪いでいるでしょう。<br>';
    } elseif ($rand_num >= 20) {
      $message = $your_name.'さんへ。<br>あなたは普通の運です。<br>あなたのような人へのコメントが一番困るのです。<br>';
    } elseif ($rand_num >= 10) {
      $message = $your_name.'さんへ。<br>あなたはそこそこの不運です。<br>タンスのカドには常に気をつけていてください。<br>';
    } elseif ($rand_num >= 0) {
      $message = $your_name.'さんへ。<br>あなたはなかなかな凶運です。<br>障害を乗り越えていくことで次の障害に出会えるでしょう。<br>';
    } else {
      $message = $your_name.'さんへ。<br>ノーコメントとさせてください。<br>あなたに掛ける言葉が見つからないのです。<br>';
    }
    echo $message;
  }

  // 進数変換アプリ実行関数
  function base_check($base_num) {
    $binary_num = decbin($base_num);
    $hexadecimal_num = dechex($base_num);
    echo '入力された10進数の数値は'.$base_num.'です。<br>';
    echo '2進数で表記すると'.$binary_num.'になります。<br>';
    echo '16進数で表記すると'.$hexadecimal_num.'になります。<br>';
  }


  // 以下の処理からに下記の形式でログを取得
  //   error_log(date('Y-m-d G:i:s',time()).': 処理内容とステータス<br>', 3, '課題10_log.txt');

  error_log(date('Y-m-d G:i:s',time()).': 全体処理を開始<br>', 3, '課題10_log.txt');

  echo '【おみくじアプリ】<br><br>';
  echo '◆名前を入れる<form action=課題10.php method=“get”><input type="text" name="name"><br><input type="submit" value="おみくじを引く"></form>';


  if (!isset($_GET['name'])) {
    error_log(date('Y-m-d G:i:s',time()).": GETリクエストNAME未取得時の処理を開始<br>", 3, '課題10_log.txt');
    echo "名前を入力してボタンを押してください<br>";
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME未取得時の処理を終了<br>', 3, '課題10_log.txt');
  } else {
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時の処理を開始<br>', 3, '課題10_log.txt');
    if (empty($_GET['name'])) {
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時/空文字列取得時の処理を開始<br>', 3, '課題10_log.txt');
      echo "名前が未入力です<br>";
      echo "名前を入力してボタンを押してください<br>";
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時/空文字列取得時の処理を終了<br>', 3, '課題10_log.txt');
    } else {
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時/not空文字列取得時の処理を開始<br>', 3, '課題10_log.txt');
      $your_name = $_GET['name'];
      fortune_cookie($your_name);
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時/not空文字列取得時の処理を終了<br>', 3, '課題10_log.txt');
    }
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNAME取得時の処理を開始<br>', 3, '課題10_log.txt');
  }


  // 進数変換アプリ画面出力
  echo '<br><br>';
  echo '【進数変換アプリ】<br><br>';
  echo '◆変換したい整数値を入れる<form action=課題10.php method=“get”><input type="text" name="num"><br><input type="submit" value="変換を行う"></form>';

  if (!isset($_GET['num'])) {
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM未取得時の処理を開始<br>', 3, '課題10_log.txt');
    echo "変換したい整数値を入力してボタンを押してください<br>";
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM未取得時の処理を終了<br>', 3, '課題10_log.txt');
  } else {
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時の処理を開始<br>', 3, '課題10_log.txt');
    if (empty($_GET['num'])) {
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/空文字列取得時の処理を開始<br>', 3, '課題10_log.txt');
      echo "数値が未入力です<br>";
      echo "変換したい整数値を入力してボタンを押してください<br>";
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/空文字列取得時の処理を終了<br>', 3, '課題10_log.txt');
    } else {
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/not空文字列取得時の処理を開始<br>', 3, '課題10_log.txt');
      $base_num = $_GET['num'];
      if (!ctype_digit($base_num)) {
        error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/not整数値取得時の処理を開始<br>', 3, '課題10_log.txt');
        echo "入力された値が整数値ではありません<br>";
        echo "変換したい整数値を入力してボタンを押してください<br>";
        error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/not整数値取得時の処理を終了<br>', 3, '課題10_log.txt');
      } else {
        error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/整数値取得時の処理を開始<br>', 3, '課題10_log.txt');
        base_check($base_num);
        error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/整数値取得時の処理を終了<br>', 3, '課題10_log.txt');
      }
      error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時/not空文字列取得時の処理を開始<br>', 3, '課題10_log.txt');
    }
    error_log(date('Y-m-d G:i:s',time()).': GETリクエストNUM取得時の処理を終了<br>', 3, '課題10_log.txt');
  }

  error_log(date('Y-m-d G:i:s',time()).': 全体処理を終了<br>', 3, '課題10_log.txt');

  echo '<br><br>___以下にてログを出力___<br>';
  echo file_get_contents('課題10_log.txt');




  //  +    date_default_timezone_set('Asia/Tokyo');
  //  +        $log_time = mktime();
  //  +        $date1 = date('Y-m-d G:i:s',$log_time);
  //  +        $log_msg = "$date1:開始<br>";
  //  +        error_log($log_msg,3,'4-10-log.txt');
  //  +
  //  +    $shop = array(
  //  +        "石鹸" => "200",
  //  +        "お茶" => "100",
  //  +        "お米" => "900",
  //  +    );
  //  +    error_log("配列を作成しました<br>",3,'4-10-log.txt');
  //  +
  //  +    $shop_meat = array("肉" => "300");
  //  +    array_merge($shop,$shop_meat);
  //  +    error_log("商品を追加しました<br>",3,'4-10-log.txt');
  //  +
  //  +    asort($shop);
  //  +    error_log("商品を並べました<br>",3,'4-10-log.txt');
  //  +
  //  +    array_reverse($shop);
  //  +    error_log("商品を逆順にしました<br>",3,'4-10-log.txt');
  //  +
  //  +    array_shift($shop);
  //  +    error_log("先頭の商品を削除しました<br>",3,'4-10-log.txt');
  //  +
  //  +    $log_msg = "$date1:終了<br>";
  //  +    error_log($log_msg,3,'4-10-log.txt');
  //  +
  //  +    $read_log = file_get_contents('4-10-log.txt');
  //  +    echo $read_log;
