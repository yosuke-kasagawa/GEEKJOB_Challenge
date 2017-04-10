<?php

  function registration ($id, $name, $birthday, $address) {
    $info = array(
      'id' => $id,
      'name' => $name,
      'birthday' => $birthday,
      'address' => $address
    );
    return $info;
  }

  $members = array();
  $members[] = registration(111,'kasagawa','1990/10/28','162-0825');
  $members[] = registration(112,'sato','1995/1/1','162-0001');
  $members[] = registration(113,'tanaka','1985/12/31','162-9999');

  echo "<PRE>";
  print_r($members);
  echo "<PRE>";


  function call ($arr_parent) {
    foreach ($arr_parent as $key_parent => $value_parent) {
      foreach ($value_parent as $key_child => $value_child) {
        if ($key_child == 'id' || $key_child == 'address') {
          continue;
        }
        echo $key_child.':'.$value_child.'<br>';
      }
      echo '<br>';
    }
  }

  call($members);
