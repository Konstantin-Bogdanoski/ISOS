<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$prvaFile = "files/prva.txt";
$vtoraFile = "files/vtora.txt";
$rezultatFile = "files/rezultat.txt";

$handlePrva = fopen($prvaFile, "r") or die("Unable to open file PRVA.TXT");
$handleVtora = fopen($vtoraFile, "r") or die("Unable to open file VTORA.TXT");
$handleRezultat = fopen($rezultatFile, "w") or die("Unable to open file REZULTAT.TXT");

echo "<h1>Successfully opened the files</h1>";

if ($handleRezultat) {
    if ($handlePrva) {
        echo "<h1>Reading lines from prva.txt</h1>";
        while (($line = fgets($handlePrva)) !== false)
            fputs($handleRezultat, str_replace("-", " ", $line));
        echo "<h1>Successfully read and parsed the lines from prva.txt</h1>";
        fclose($handlePrva);
    } else {
        echo "<h1>ERROR WHILE READING prva.txt</h1>";
        error_log("ERROR WHILE READING prva FILE");
    }

    if ($handleVtora) {
        echo "<h1>Reading lines from vtora.txt</h1>";
        while (($line = fgets($handleVtora)) !== false)
            fputs($handleRezultat, $line);
        echo "<h1>Successfully read and parsed the lines from vtora.txt</h1>";
        fclose($handleVtora);
    } else {
        echo "<h1>ERROR WHILE READING vtora.txt</h1>";
        error_log("ERROR WHILE READING vtora FILE");
    }

    fclose($handleRezultat);
} else {
    echo "<h1>ERROR WHILE WRITING rezultat.txt</h1>";
    error_log("ERROR WHILE WRITING rezultat FILE");
}