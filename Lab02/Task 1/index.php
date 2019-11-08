<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$arr1 = array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$arr2 = array('Konstantin' => 'Konstantin', 'Bogdanoski' => 'Bogdanoski', 'Gostivar' => 'Gostivar');
$arr3 = array(array(11, 22, 13, 44, 15), array(122, 21, 12, 9, 5), array(1, 2, 3, 4, 5), array(10, 20, 30, 40, 50));

foreach ($arr3 as $k => $v) {
    echo "<br>";
    foreach ($v as $key => $val)
        echo $val . " ";
}
echo "<br><br>";

$above20 = array();

foreach ($arr3 as $k => $v) {
    foreach ($v as $key => $val)
        if ($val > 20)
            array_push($above20, $val);
}

echo "Above 20: ";
foreach ($above20 as $key => $value)
    echo $value . " ";
echo "<br>";


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