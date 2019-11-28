<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $shopping_list_id = $_POST['shopping_list_id'];


}
else
    header("Location: /");