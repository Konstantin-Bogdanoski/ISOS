<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$string = "abcd efg hijk LMNOP";

echo "<strong>Printing String:</strong><br>";
echo $string;

echo "<hr>";
echo "<strong>Printing StrToUpper:</strong><br>";
echo strtoupper($string);
echo " ========== Makes ALL the characters of the STRING to be UPPER CASE";

echo "<hr>";
echo "<strong>Printing StrToLower:</strong><br>";
echo strtolower($string);
echo " ============= Makes ALL the characters of the STRING to be LOWER CASE";

echo "<hr>";
echo "<strong>Printing UCFirst:</strong><br>";
echo ucfirst($string);
echo " ============ Makes the FIRST character of the STRING be UPPER CASE";

echo "<hr>";
echo "<strong>Printing UCWords:</strong><br>";
echo ucwords($string);
echo " =========== Makes the FIRST character of EACH WORD of the STRING be UPPER CASE";