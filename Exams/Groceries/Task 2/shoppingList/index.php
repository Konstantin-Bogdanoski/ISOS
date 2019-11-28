<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $secret = $_POST['secret'];
    $shopping_list_id = $_POST['shopping_list_id'];
    var_dump($secret, $shopping_list_id);
}
else
    header("Location: /");