<?php

$code = 0;
$start = 50;

$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
  $line = trim($line);
  $length = strlen($line);

  if ($length > 4) echo "Input error on line:" . $line;

  $direction = substr($line, 0, 1);
  $offset = $length-1;
  $rotation = (int)substr($line,-$offset);
  $rotation %= 100;
  if ($direction === "R") {
    $start = $start + $rotation;
    $start %= 100;
    if ($start == 0) $code++;
  }
  elseif ($direction === "L") {
    $start = $start - $rotation;
    if ($start < 0) $start += 100;
    if ($start == 0) $code++;
  }
}
fclose($fp);

echo "De code is: " . $code . PHP_EOL;