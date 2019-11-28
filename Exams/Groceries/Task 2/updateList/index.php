<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "POST"
    && isset($_POST['shopping_list_id'])
    && isset($_POST['checked'])){
    require_once ("../config/connection.php");
    $shopping_list_id = $_POST['shopping_list_id'];
    $checked = $_POST['checked'];
    $query = "UPDATE groceries.shopping_list SET favorite=$checked WHERE shopping_list_id=$shopping_list_id";
    $conn->query($query);
}

header("Location: /");