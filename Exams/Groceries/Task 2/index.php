<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
//USED SECRETS (List1 -> secret1, List2 -> secret2)
require_once("./config/connection.php");
$query = "SELECT * FROM shopping_list WHERE favorite=1";
$shopping_lists = $conn->query($query);
$flag = false;
if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['flag']))
    $flag = $_GET['flag'];
if($flag=="true" || count($shopping_lists->fetchAll()) == 0){
        $query = "SELECT * FROM shopping_list";
        $shopping_lists = $conn->query($query);
}
else{
    $query = "SELECT * FROM shopping_list WHERE favorite=1";
    $shopping_lists = $conn->query($query);
    $flag=true;
}
?>
    <h1>Shopping Lists</h1>
    <button onclick="location.href='/addList'">Add new list</button>
    <table style="border: 2px solid black">
        <thead style="border: 2px solid black">
            <tr>
                <th>
                    Shopping List
                </th>
                <th>
                    Check out Shopping List
                </th>
                <th>
                    Add to Favorites
                </th>
            </tr>
        </thead>
<?php
    while ($shopping_list = $shopping_lists->fetchAll())
        for($i=0 ; $i<count($shopping_list); $i++) {
            ?>
            <tr style="border: 2px solid black">
                <td style="border: 2px solid black">
                    <?php echo $shopping_list[$i]['list_name']?>
                </td>
                <td style="border: 2px solid black">
                   <a href="./shoppingList?ID=<?php echo $shopping_list[$i]['shopping_list_id'] ?>">Check out shopping list</a>
                </td>
                <td style="border: 2px solid black">
                            <?php
                                $checked = $shopping_list[$i]['favorite'] == 1 ? 'checked' : '';
                            ?>
                            <label for='favoriteCheckbox'>Favorite:</label>
                            <form method='post' action='./updateList'>
                            <input type='hidden' value='<?php echo $shopping_list[$i]['shopping_list_id']?>' name='shopping_list_id'>
                            <?php
                            if ($checked == 'checked') {
                                ?>
                                <input name="checked" value="0" hidden>
                                <input id='favoriteCheckbox' type='checkbox' checked='checked' name='approved' formmethod='post' formaction='./updateList' onchange='this.form.submit()'>
                            <?php
                            }
                            else {
                                ?>
                                <input name="checked" value="1" hidden>
                                <input id='favoriteCheckbox' type='checkbox' name='approved' formmethod='post' formaction='./updateList' onchange='this.form.submit()'>
                                <?php
                            }
                            ?>
                            </form>
                </td>
            </tr>
            <?php
}
?>
    </table>
<?php
if($flag){
    ?>
    <form method="get" action="">
        <input name="flag" value="<?php echo "true" ?>" hidden>
        <button type="submit">Show all lists</button>
    </form>
    <?php
}

?>
