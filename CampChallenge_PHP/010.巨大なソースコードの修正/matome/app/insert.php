<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" placeholder="例: 笠川 陽介" value=<?= isset($_POST['name']) ? h($_POST['name']) : ''; ?>>
    <br><br>

    生年月日:
    <select name="year">
        <option value=<?= isset($_POST['year']) ? $_POST['year'] : "----"; ?>><?= isset($_POST['year']) ? $_POST['year'] : "----"; ?></option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value=<?= isset($_POST['month']) ? $_POST['month'] : "--"; ?>><?= isset($_POST['month']) ? $_POST['month'] : "--"; ?></option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value=<?= isset($_POST['day']) ? $_POST['day'] : "--"; ?>><?= isset($_POST['day']) ? $_POST['day'] : "--"; ?></option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="1" <?= (isset($_POST['type'])) && (($_POST['type'] == "営業") || ($_POST['type'] == "その他")) ? "" : "checked"; ?>>エンジニア<br>
    <input type="radio" name="type" value="2" <?= (isset($_POST['type'])) && ($_POST['type'] == "営業") ? "checked" : ""; ?>>営業<br>
    <input type="radio" name="type" value="3" <?= (isset($_POST['type'])) && ($_POST['type'] == "その他") ? "checked" : ""; ?>>その他<br>
    <br>

    電話番号:
    <input type="tel" name="tell" placeholder="例: 090-1234-5678" pattern="\d{1,5}-\d{1,4}-\d{3,4}" title="半角英数字を用いて市外局番からハイフン（-）を入れて入力してください。" value=<?= isset($_POST['tell']) ? h($_POST['tell']) : ""; ?>>
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?= isset($_POST['comment']) ? h($_POST['comment']) : "ご自由にどうぞ"; ?></textarea><br><br>
    <input type="hidden" name="regular_route" value="1">
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    <?= return_top(); ?>
</body>
</html>
