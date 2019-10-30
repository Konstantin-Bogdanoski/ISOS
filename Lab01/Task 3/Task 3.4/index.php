<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$string = "PHP is a widely-used general-purpose scripting language that is especially suited for Web development";
$tempArray = explode(" ", $string);
echo "<hr>";
echo "<strong>Printing BASE STRING:</strong><br>";
print_r($string);

$finalArray = array();
foreach ($tempArray as $key => $value) {
    $newKey = strlen($value);
    $finalArray[$newKey] = $value;
}

echo "<hr>";
echo "<strong>Printing ARRAY:</strong><br>";
print_r($finalArray);