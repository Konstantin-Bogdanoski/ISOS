<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$files = scandir('../files/');
echo "WHAT";
foreach ($files as $file) {
    echo "<p>" . $file . "</p>";
}