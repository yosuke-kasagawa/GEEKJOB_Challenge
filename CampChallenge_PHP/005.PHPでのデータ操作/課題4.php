<?php

  // var_dump($_FILES);
  // echo '<br>';    # サーバへの保存とファイル情報を確認

  $file_name = '課題4_アップロード先.txt';

  // var_dump(move_uploaded_file($_FILES['usefile']['tmp_name'], $file_name));
  //   => bool(true)    # move_uploaded_file が未実行のため

  move_uploaded_file($_FILES['usefile']['tmp_name'], $file_name);

  // var_dump(move_uploaded_file($_FILES['usefile']['tmp_name'], $file_name));
  //   => bool(false)   # move_uploaded_file が実行済みのため

  if ((move_uploaded_file($_FILES['userfile']['tmp_name'], $file_name)) == false) {
    echo '<br>アップロードが完了しました！';
  } else {
    echo '<br>失敗しちゃいました…。';
  }

  echo '<br><br>___↓内容はこちら↓___<br>';
  $fp = fopen($file_name, 'r');
  while (!feof($fp)) {
    $get_text = fgets($fp);
    echo $get_text.'<br>';
  }
  fclose($fp);
