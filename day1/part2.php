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
  $quotient = intdiv($rotation, 100);
  if ($quotient > 0) $code += $quotient;

  $rotation %= 100;
  if ($direction === "R") {
    $start += $rotation;
    if ($start > 100) $code++;
    $start %= 100;
    if ($start == 0) $code++;
  }
  elseif ($direction === "L") {
    $reset_start = $start;
    $start -= $rotation;
    if ($start < 0) {
      if ($reset_start != 0) $code++;
      $start += 100;
    }
    if ($start == 0) $code++;
  }
}
fclose($fp);

echo "De code is: " . $code . PHP_EOL;