<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$files = $_POST['remove'];
$handleLog = fopen("../log/log.txt", "a+");

foreach ($files as $file)
    unlink("../files/" . $file) or fputs($handleLog, "\n[DELETE] COULD NOT DELETE FILE " . $file);

header("Location: http://localhost:8080/");