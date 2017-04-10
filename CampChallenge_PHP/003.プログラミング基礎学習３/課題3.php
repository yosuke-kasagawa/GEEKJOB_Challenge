<?php

  function calculation ($number = 423, $multiplied = 5, $type = false) {
    $base = $number * $multiplied;
    if ($type) {
      echo $base * $base;
    } else {
      echo $base;
    }
  }

  calculation();
