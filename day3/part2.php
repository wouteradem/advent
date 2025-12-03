<?php

const JOLTAGE_LENGTH = 12;

$sum = 0;

$fp = @fopen("input", "r");
while (($line = fgets($fp, 4096)) !== false) {
	$bank = trim($line);
	$joltage = "";
    for ($i=0; $i<JOLTAGE_LENGTH; $i++) {
        $group_length = JOLTAGE_LENGTH - strlen($joltage);
        $index = strlen($bank) - $group_length + 1;
        $bank_to_search_in_for_largest_number = substr($bank, 0, $index);
        $index = array_keys(str_split($bank_to_search_in_for_largest_number), max(str_split($bank_to_search_in_for_largest_number)))[0];
        $joltage .= $bank[$index];
        $bank = substr($bank, $index + 1);
    }
    $sum += (int)$joltage;
}

echo "De joltage is: " . $sum . PHP_EOL;