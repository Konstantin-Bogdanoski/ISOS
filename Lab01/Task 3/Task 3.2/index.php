<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$numbers = array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$words = array("Konstantin" => "Konstantin", "Bogdanoski" => "Bogdanoski", "Gostivar" => "Gostivar");
$multidimensionalArray = array(
    array(rand(1, 100), rand(1, 100), rand(1, 100)),
    array("ISOS", "InSOK", "Prevedeno na nekoj drug jazik"),
    array(1.5, 2.1, 100.5)
);

echo "<hr>";
echo "<strong>Printing NUMBER ARRAY:</strong><br>";
foreach ($numbers as $number) {
    echo $number . "\t";
}
echo "<br>";

echo "<hr>";
echo "<strong>Printing KEY=>VALUE ARRAY:</strong><br>";
foreach ($words as $key => $word) {
    echo $key . "=>" . $word . "\t";
}
echo "<br>";

echo "<hr>";
echo "<strong>Printing MULTIDIMENSIONAL ARRAY:</strong><br>";
foreach ($multidimensionalArray as $array) {
    foreach ($array as $item)
        echo $item . "\t";
    echo "<br>";
}