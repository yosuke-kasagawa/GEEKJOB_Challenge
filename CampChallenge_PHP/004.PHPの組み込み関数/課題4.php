<?php

  $newyear2015 = mktime(0, 0, 0, 1, 1, 2015);
  $newyearEve2015 = mktime(23, 59, 59, 12, 31, 2015);
  $elapsed_time = $newyearEve2015 - $newyear2015;
  echo $elapsed_time.'<br>';
