<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "POST"){
    require_once("../config/connection.php");
    $secret = $_POST['secret'];
    $shopping_list_id = $_POST['shopping_list_id'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    if(!isset($_POST['is_urgent']))
        $is_urgent = 0;
    else
        $is_urgent = 1;
    $created_at = date('y-m-d H:i:s');
    $query = "INSERT INTO groceries.product (shopping_list_id, quantity, product_name, is_urgent, created_at) VALUES (?, ?, ?, ?, ?)";
    $insertQry = $conn->prepare($query);
    var_dump($insertQry->execute([$shopping_list_id, $quantity, $product_name, $is_urgent, $created_at]));
    ?>
    <form method="post" id="form" action="../shoppingList">
        <input name="secret" value="<?php echo $secret ?>" hidden>
        <input name="shoppingListId" value="<?php echo $shopping_list_id ?>" hidden>
    </form>
    <script type="text/javascript">
        document.getElementById("form").submit();
    </script>
    <?php
}