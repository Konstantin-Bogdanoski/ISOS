<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$name = $_GET["ime"];
$surname = $_GET["prezime"];
$email = $_GET["email"];
$sex = $_GET["pol"];

if (!isset($name) || !isset($surname) || !isset($email) || !isset($sex))
    header("Location: localhost:8080/form.php");
else {
    echo "NAME: " . $name . "; SURNAME: " . $surname . "; EMAIL: " . $email . "; SEX: ";
    if ($sex == 1)
        echo "male";
    else
        echo "female";
}