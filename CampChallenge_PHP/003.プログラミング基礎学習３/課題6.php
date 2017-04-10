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


  function reference ($arr_parent, $word) {
    foreach ($arr_parent as $key_parent => $value_parent) {
      if (strpos($value_parent['name'], $word) !== false) {
        $hit = $value_parent;
        return $hit;
      }
    }
  }

  $answer = reference ($members, 'an');
  echo "<PRE>";
  print_r($answer);
  echo "<PRE>";
