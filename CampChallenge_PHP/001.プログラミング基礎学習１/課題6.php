<?php

  $total = $_GET['total'];
  $quantity = $_GET['quantity'];
  $type = $_GET['type'];

  $types = array('雑貨', '生鮮食品', 'その他');
  $price = intval($total / $quantity);
  $point = 0;
  $points = 0;



  echo '【笠川商店ご利用明細】'.'<br>'.'<br>';

  if ($type == 0 || $type == 1 || $type == 2) {
    echo 'お買い上げ商品---'.$types[$type].'<br>';
  } else {
    echo 'お買い上げ商品---この商品は登録されていません'.'<br>';
  }

  echo 'お買い上げ合計---'.$total.'円'.'<br>'.'1個あたり金額----'.$price.'円'.'<br>'.'<br>';

  if ($total >= 5000) {
    $point = intval($total * 0.05);
    $points += $point;
    echo '獲得ポイント---'.$point.'ポイント'.'<br>';
  } elseif ($total >= 3000) {
    $point = intval($total * 0.04);
    $points += $point;
    echo '獲得ポイント---'.$point.'ポイント'.'<br>';
  } else {
    echo '※3000円以上のお買い上げで4%のポイント進呈'.'<br>'.'　5000円以上のお買い上げなら5%にポイントアップ！';
  }

  echo '<br>'.'<br>'.'またのご利用をお待ちしております';
