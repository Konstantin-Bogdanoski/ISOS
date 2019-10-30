<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
echo "<h1>Hello World!</h1>";
$string = "this is a string!";
$number = 1;
$array = array(1, "array", 2.3);

echo "<hr>";
echo "<strong>Printing STRING:</strong><br>";
echo $string;

echo "<hr>";
echo "<strong>Printing NUMBER:</strong><br>";
echo $number;

echo "<hr>";
echo "<strong>Printing ARRAY:</strong><br>";
print_r($array);