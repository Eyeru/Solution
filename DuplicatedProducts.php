<?php


/*
 * Complete the 'numDuplicates' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. STRING_ARRAY name
 *  2. INTEGER_ARRAY price
 *  3. INTEGER_ARRAY weight
 */

function numDuplicates($name, $price, $weight) {
    // Write your code here
    $max = count($name);
    $find = array();
    for($x = 0; $x < $max; $x++) {
    $find[$x] = implode([$name[$x], $price[$x], $weight[$x]]);
             }        
$result = array_unique($find);
$min = count($result);
$count = $max - $min;
return $count;
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$name_count = intval(trim(fgets(STDIN)));

$name = array();

for ($i = 0; $i < $name_count; $i++) {
    $name_item = rtrim(fgets(STDIN), "\r\n");
    $name[] = $name_item;
}

$price_count = intval(trim(fgets(STDIN)));

$price = array();

for ($i = 0; $i < $price_count; $i++) {
    $price_item = intval(trim(fgets(STDIN)));
    $price[] = $price_item;
}

$weight_count = intval(trim(fgets(STDIN)));

$weight = array();

for ($i = 0; $i < $weight_count; $i++) {
    $weight_item = intval(trim(fgets(STDIN)));
    $weight[] = $weight_item;
}

$result = numDuplicates($name, $price, $weight);

fwrite($fptr, $result . "\n");

fclose($fptr);