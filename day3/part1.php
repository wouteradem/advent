<?php

$sum = 0;
$digits = ['9', '8', '7', '6', '5', '4', '3', '3', '2', '1', '0'];

$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
	$bank = trim($line);
	$pos = 0;
	$frst_digit = substr($bank, 0, -1);
	foreach ($digits as $digit) {
		if (str_contains($frst_digit, $digit)) {
			$pos = strpos($frst_digit, $digit);
			$joltage = 10 * (int)$digit;
			break;
		}
	}

	$scnd_digit = substr($bank, $pos + 1);
	foreach ($digits as $digit) {
		if (str_contains($scnd_digit, $digit)) {
			$joltage += (int)$digit;
			break;
		}
	}
	$sum += $joltage;
}
fclose($fp);

echo "De code is: " . $sum . PHP_EOL;