<?php

$sum = 0;

$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
  $line = trim($line);
  $ranges = explode(',', $line);
  foreach ($ranges as $range) {
    preg_match('/(.*[0-9])-(.*[0-9])/', $range, $ids);
    if (strlen($ids[1]) % 2 != 0 && strlen($ids[2]) % 2 != 0) continue;
    else {
      for ($i=(int)$ids[1]; $i<=(int)$ids[2]; $i++) {
        if (strlen((string)$i) % 2 != 0) continue;
        else {
          $offset = intdiv(strlen($i), 2);
          $m1 = substr((string)$i, 0, $offset);
          $m2 = substr((string)$i, -$offset);
          if ($m1 === $m2) {
            $sum += (int)($i);
          }
        }
      }
    }
  }
}
fclose($fp);

echo "De code is: " . $sum . PHP_EOL;