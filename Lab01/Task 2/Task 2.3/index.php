<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$arr = array("programski", "praktikum", "laboratoriski", "vezbi");
print_r($arr);

echo "<hr>";

$string = implode(" - ", $arr);
echo "$string";