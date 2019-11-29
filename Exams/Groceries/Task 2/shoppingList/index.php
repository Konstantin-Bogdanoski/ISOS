<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['secret'])) {
    require_once ("../config/connection.php");
    $secret = $_POST['secret'];
    $shopping_list_id = $_POST['shoppingListId'];
    $query = "SELECT * FROM shopping_list WHERE shopping_list_id=?";
    $sList = $conn->prepare($query);
    $sList->execute([$shopping_list_id]);
    if($sList->rowCount() > 0){
        while($list = $sList->fetchAll()){
            for($i = 0; $i<count($list); $i++){
                if($list[$i]['secret'] == md5($secret)){
                    $query = "UPDATE shopping_list SET favorite=1 WHERE shopping_list_id=?";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([$shopping_list_id]);
                    $query = "SELECT * FROM product WHERE shopping_list_id=? ORDER BY is_urgent DESC, is_bought";
                    $products = $conn->prepare($query);
                    $products->execute([$shopping_list_id])
                    ?>
                    <table style="border: 2px solid black">
                    <thead style="border: 2px solid black">
                        <tr style="border: 2px solid black">
                        <th style="border: 2px solid black">
                            Product
                        </th>
                        <th style="border: 2px solid black">
                            Quantity
                        </th>
                        <th style="border: 2px solid black">
                            Add +1
                        </th>
                        <th style="border: 2px solid black">
                            Remove -1
                        </th>
                        </tr>
                    </thead>
                    <?php
                    while($product = $products->fetchAll()){
                        for($j=0; $j<count($product); $j++) {
                            $isBought = $product[$j]['is_bought'];
                            $isUrgent = $product[$j]['is_urgent'];
                            if (!$isBought) {
                                ?>
                                <tr style="border: 2px solid black">
                                    <td style="border: 2px solid black; text-align: left">
                                        <form method="post" action="../buy">
                                            <input name="product_id" value="<?php echo $product[$j]['product_id'] ?>"
                                                   hidden>
                                            <input name="secret" value="<?php echo $secret ?>" hidden>
                                            <input name="shopping_list_id" value="<?php echo $shopping_list_id ?>"
                                                   hidden>
                                            <button type="submit"
                                                    style="<?php if ($isUrgent) echo "font-weight: bold; " ?> background: none!important; border: none; padding: 0!important; color: #069; text-decoration: underline; cursor: pointer;"><?php echo $product[$j]['product_name'] ?></button>
                                        </form>
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                        <?php echo $product[$j]['quantity'] ?>
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                        <form method="post" action="../add">
                                            <input name="product_id" value="<?php echo $product[$j]['product_id'] ?>"
                                                   hidden>
                                            <input name="secret" value="<?php echo $secret ?>" hidden>
                                            <input name="shopping_list_id" value="<?php echo $shopping_list_id ?>"
                                                   hidden>
                                            <button type="submit"
                                                    style="background: none!important; border: none; padding: 0!important; color: #069; text-decoration: underline; cursor: pointer;">
                                                +1
                                            </button>
                                        </form>
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                        <form method="post" action="../remove">
                                            <input name="product_id" value="<?php echo $product[$j]['product_id'] ?>"
                                                   hidden>
                                            <input name="secret" value="<?php echo $secret ?>" hidden>
                                            <input name="shopping_list_id" value="<?php echo $shopping_list_id ?>"
                                                   hidden>
                                            <button type="submit"
                                                    style="background: none!important; border: none; padding: 0!important; color: #069; text-decoration: underline; cursor: pointer;">
                                                -1
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            else{
                                ?>
                                <tr style="border: 2px solid black">
                                    <td style="border: 2px solid black; text-align: left">
                                        <form method="post" action="../buy">
                                            <input name="product_id" value="<?php echo $product[$j]['product_id'] ?>"
                                                   hidden>
                                            <input name="secret" value="<?php echo $secret ?>" hidden>
                                            <input name="shopping_list_id" value="<?php echo $shopping_list_id ?>"
                                                   hidden>
                                            <button type="submit"
                                                    style="text-decoration: line-through; background: none!important; border: none; padding: 0!important; color: #069; cursor: pointer;"><?php echo $product[$j]['product_name'] ?></button>
                                        </form>
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                    </td>
                                    <td style="border: 2px solid black; text-align: right">
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                    </table>
                    <form method="post" action="../addProduct" style="border: 1px solid black">
                        <input name="shopping_list_id" value="<?php echo $shopping_list_id?>" hidden>
                        <input name="secret" value="<?php echo $secret?>" hidden>
                        <label for="product_name">Product Name</label><br>
                        <input id="product_name" name="product_name" type="text" required><br>
                        <label for="quantity">Quantity</label><br>
                        <input id="quantity" name="quantity" type="number" min="1" required><br>
                        <label for="is_urgent">Is urgent?</label><br>
                        <input id="is_urgent" name="is_urgent" type="checkbox"><br>
                        <button type="submit">Add Item</button>
                    </form>
                    <button onclick="location.href='/'">All Lists</button>
                    <?php
                }
            }
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['ID'])) {
    $shopping_list_id = $_GET['ID'];
    ?>
    <form method="post" action="../shoppingList/index.php">
        <input name="shoppingListId" value="<?php echo $shopping_list_id ?>" hidden>
        <label for="secret">Password</label><br>
        <input id="secret" type="text" name="secret"><br>
        <button type="submit">Submit</button>
    </form>
    <?php

} else
    header("Location: /");