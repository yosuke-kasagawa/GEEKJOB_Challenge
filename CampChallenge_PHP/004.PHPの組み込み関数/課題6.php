<?php

  // echo substr('yosuke.kasagawa@gmail.com', 15, 10).'<br>';

  $mail_address = 'yosuke.kasagawa@gmail.com';

  $domain_start = strpos ($mail_address, '@');
  $domain_end = mb_strlen($mail_address);
  $domain_length = $domain_end - $domain_start;
  $domain_name = substr($mail_address, $domain_start, $domain_length).'<br>';

  echo 'あなたのメールアドレス：'.$mail_address.'<br>';
  echo 'メールドメイン：'.$domain_name.'<br>';
