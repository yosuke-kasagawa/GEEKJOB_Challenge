<?php

  $num = $_GET['num'];
  $message = '';

  switch($num) {
    case 1:
      $message = 'one';
      break;
    case 2:
      $message = 'two';
      break;
    default:
      $message = '想定外';
      break;
  }

  echo $message;
