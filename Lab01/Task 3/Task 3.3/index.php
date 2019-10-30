<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$numbers = array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$numbersAbove20 = array();

echo "<hr>";
echo "<strong>Printing NUMBER ARRAY:</strong><br>";
foreach ($numbers as $number) {
    echo $number . "\t";
}

foreach ($numbers as $number) {
    if ($number > 20)
        array_push($numbersAbove20, $number);
}

echo "<hr>";
echo "<strong>Printing NUMBERS ABOVE 20 ARRAY:</strong><br>";
foreach ($numbersAbove20 as $number) {
    echo $number . "\t";
}

$max = max($numbers);
$min = min($numbers);

echo "<hr>";
echo "<strong>Printing MAX NUMBER:</strong><br>";
echo "$max";

echo "<hr>";
echo "<strong>Printing MIN NUMBER</strong><br>";
echo "$min";