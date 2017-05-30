<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
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
    if(!empty($_POST['name']) && $_POST['year'] !== "----" && $_POST['month'] !== "--" && $_POST['day'] !== "--" && !empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment'])){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        if(!isset($_SESSION)){ session_start(); }
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
    ?>

        <?php
            //種別を数値から名称に変換
            $post_type_name = '';
            if ($post_type == '1') {
                $post_type_name = 'エンジニア';
            } elseif ($post_type == '2') {
                $post_type_name = '営業';
            } elseif ($post_type == '3') {
                $post_type_name = 'その他';
            }
         ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type_name;?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="hidden" name="regular_route" value="1">
          <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="hidden" name="name" value="<?php echo $_POST["name"]?>">
            <input type="hidden" name="year" value="<?php echo $_POST["year"]?>">
            <input type="hidden" name="month" value="<?php echo $_POST["month"]?>">
            <input type="hidden" name="day" value="<?php echo $_POST["day"]?>">
            <input type="hidden" name="type" value="<?php echo $_POST["type"]?>">
            <input type="hidden" name="tell" value="<?php echo $_POST["tell"]?>">
            <input type="hidden" name="comment" value="<?php echo $_POST["comment"]?>">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください
        <br><br>
        <?php
            //不完全な項目について警告
            if (empty($_POST['name'])) { echo "名前が未入力です<br>"; }
            if (!isset($_POST['year']) || $_POST['year'] == "----") { echo "誕生年が未設定です<br>"; }
            if (!isset($_POST['month']) || $_POST['month'] == "--") { echo "誕生月が未設定です<br>"; }
            if (!isset($_POST['day']) || $_POST['day'] == "--") { echo "誕生日が未設定です<br>"; }
            if (empty($_POST['type'])) { echo "種別が未設定です<br>"; }
            if (empty($_POST['tell'])) { echo "電話番号が未入力です<br>"; }
            if (empty($_POST['comment'])) { echo "自己紹介が未入力です<br>"; }
        ?>
        <br>

        <form action="<?php echo INSERT ?>" method="POST">
            <!-- フォームに値を保持するための処理: ここから -->
            <input type="hidden" name="name" value="<?php echo $_POST["name"]?>">
            <input type="hidden" name="year" value="<?php echo $_POST["year"]?>">
            <input type="hidden" name="month" value="<?php echo $_POST["month"]?>">
            <input type="hidden" name="day" value="<?php echo $_POST["day"]?>">
            <input type="hidden" name="type" value="<?php echo $_POST["type"]?>">
            <input type="hidden" name="tell" value="<?php echo $_POST["tell"]?>">
            <input type="hidden" name="comment" value="<?php echo $_POST["comment"]?>">
            <!-- フォームに値を保持するための処理: ここまで -->
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
    <?= return_top(); ?>
</body>
</html>
