<?php

$sum = 0;

$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
  $line = trim($line);
  $ranges = explode(',', $line);
  foreach ($ranges as $range) {
    preg_match('/(.*[0-9])-(.*[0-9])/', $range, $ids);
    for ($i=(int)$ids[1]; $i<=(int)$ids[2]; $i++) {
      $len = strlen((string)$i);
      for($j=1; $j<=intdiv($len, 2); $j++) {
        $measure = $len/$j;
        $group = substr((string)$i, 0, $j);
        if ($measure === substr_count((string)$i, $group)) {
          $sum += (int)($i);
          break;
        }
      }
    }
  }
}
fclose($fp);

echo "De code is: " . $sum . PHP_EOL;