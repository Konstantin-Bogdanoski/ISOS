<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "GET"){
    ?>
    <form method="post" action="">
        <label for="list_name">List name:</label><br>
        <input id="list_name" type="text" name="list_name" placeholder="List name" required><br>
        <label for="creator">Creator:</label><br>
        <input id="creator" type="text" name="creator" placeholder="email" required><br>
        <label for="secret">Secret:</label><br>
        <input id="secret" type="password" name="secret" placeholder="secret" required><br>
        <button type="submit">Add List</button>
    </form>
    <?php
}
else if ($_SERVER['REQUEST_METHOD'] === "POST"){
    require_once("../config/connection.php");
    $list_name = $_POST['list_name'];
    $email = $_POST['creator'];
    $secret = $_POST['secret'];
    $query = "SELECT * FROM shopping_list WHERE creator=? AND list_name=?";
    $checkQry = $conn->prepare($query);
    $checkQry->execute([$email, $list_name]);
    if(count($checkQry->fetchAll()) == 0) {
        $query = "INSERT INTO shopping_list (list_name, creator, secret) VALUES (?,?,?)";
        $insertQry = $conn->prepare($query);
        $insertQry->execute([$list_name, $email, md5($secret)]);
    }
    header("Location: /");
}