<?php

  $lang = $_GET['lang'];
  $message = '';

  switch($lang) {
    case A:
      $message = '英語';
      break;
    case あ:
      $message = '日本語';
      break;
    default:
      break;
  }

  echo $message;
