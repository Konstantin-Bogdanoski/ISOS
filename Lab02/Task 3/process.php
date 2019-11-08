<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

session_set_cookie_params(3600);//SESSION LASTS ONE HOUR
session_start();

$username = $_POST["username"];
$remember = $_POST["remember"];

$_SESSION["username"] = $username;

if ($remember == true) {
    setcookie("username", $username, time() + 3600);
}

echo "<h1>Hello</h1>";
echo "<a href='localhost:8080/jquery_form.php'>Go back</a>";