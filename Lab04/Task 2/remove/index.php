<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$files = $_POST['remove'];

foreach ($files as $file)
    unlink("../files/" . $file) or die("Couldn't delete file");

header("Location: http://localhost:8080/");