<?php

$code = 0;
$start = 50;
$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
  if (!preg_match('/^([RL])(\d{1,3})$/', trim($line), $m)) {
    echo "Input error on line: {$line}\n";
    return;
  }
  $direction = $m[1];
  $rotation = (int)$m[2];
  $rotation %= 100;
  if ($direction === "R") {
    $start += $rotation;
    $start %= 100;
    $code += (int)($start == 0);
  }
  elseif ($direction === "L") {
    $start -= $rotation;
    if ($start < 0) $start += 100;
    $code += (int)($start == 0);
  }
}
fclose($fp);

echo "De code is: " . $code . PHP_EOL;