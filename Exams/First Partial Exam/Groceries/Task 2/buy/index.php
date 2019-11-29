<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if($_SERVER['REQUEST_METHOD'] === "POST"){
    require_once("../config/connection.php");
    $secret = $_POST['secret'];
    $shopping_list_id = $_POST['shopping_list_id'];
    $product_id = $_POST['product_id'];

    $query="SELECT * FROM product WHERE product_id=?";
    $productQuery = $conn->prepare($query);
    $productQuery->execute([$product_id]);
    $product = $productQuery->fetchAll();
    for($i=0; $i<count($product); $i++){
        $isBought = 1;
        if($product[$i]['is_bought']) {
            $isBought = 0;
            $quantity = 1;
            $query = "UPDATE product SET is_bought=?, quantity=? WHERE product_id=?";
            $productQuery = $conn->prepare($query);
            $productQuery->execute([$isBought, $quantity, $product_id]);
        }
        else {
            $query = "UPDATE product SET is_bought=? WHERE product_id=?";
            $productQuery = $conn->prepare($query);
            $productQuery->execute([$isBought, $product_id]);
        }

        if($isBought = 1) {
            $query = "UPDATE product SET is_urgent=0 WHERE product_id=?";
            $productQuery = $conn->prepare($query);
            $productQuery->execute([$product_id]);
        }
    }
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