<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    //直リンク時の警告
    if (!isset($_POST["regular_route"])) {
        echo "非正規のアクセスです<br>";
        echo return_top();
        exit;
    } ?>

    <?php
    if(!isset($_SESSION)){ session_start(); }

    //データ挿入関数の引数を準備
    $insert_params = array(
        ':name' => $_SESSION['name'],
        ':birthday' => $_SESSION['birthday'],
        ':type' => $_SESSION['type'],
        ':tell' => $_SESSION['tell'],
        ':comment' => $_SESSION['comment'],
        ':newDate' => date("Y-m-d h:m:s")
    );

    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //データ挿入の実行
    data_insert($insert_db, $insert_sql, $insert_params);
    /* data_insert()の戻り値: $stmt->rowCount() => int(1) */

    //接続オブジェクトを初期化することでDB接続を切断
    $insert_db=null;
    ?>

    <?php
    //種別を数値から名称に変換
    $session_type_name = '';
    if ($insert_params[':type'] == '1') {
        $session_type_name = 'エンジニア';
    } elseif ($insert_params[':type'] == '2') {
        $session_type_name = '営業';
    } elseif ($insert_params[':type'] == '3') {
        $session_type_name = 'その他';
    }
    ?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo h($insert_params[':name']);?><br>
    生年月日:<?php echo h($insert_params[':birthday']);?><br>
    種別:<?php echo h($session_type_name);?><br>
    電話番号:<?php echo h($insert_params[':tell']);?><br>
    自己紹介:<?php echo h($insert_params[':comment']);?><br><br>
    以上の内容で登録しました。<br><br>

    <?php echo return_top(); ?>

</body>

</html>
