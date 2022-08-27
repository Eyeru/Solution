<?php


/*
 * Complete the 'processLogs' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts following parameters:
 *  1. STRING_ARRAY logs
 *  2. INTEGER maxSpan
 */

function processLogs($logs, $maxSpan) {
    // Write your code here
    $arrlen = count($logs);
    $ids = array();
    for($x = 0; $x < $arrlen;$x++){
        $value1 = explode(" ", $logs[$x]);
        for($y = $x+1; $y< $arrlen;$y++){
            $value2 = explode(" ",$logs[$y]);
            if($value1[0]==$value2[0]){
                $sign = abs($value1[1]-$value2[1]);
                if($sign <= $maxSpan)
                    array_push($ids,$value1[0]);
            }
        }
    }
return sort($ids);


}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$logs_count = intval(trim(fgets(STDIN)));

$logs = array();

for ($i = 0; $i < $logs_count; $i++) {
    $logs_item = rtrim(fgets(STDIN), "\r\n");
    $logs[] = $logs_item;
}

$maxSpan = intval(trim(fgets(STDIN)));

$result = processLogs($logs, $maxSpan);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);