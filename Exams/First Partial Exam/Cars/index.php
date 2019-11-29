<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    require_once("config/connection.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM mechanic WHERE username=?";
    $checkMech = $conn->prepare($query);
    $checkMech->execute([$username]);

    if ($checkMech->rowCount() > 0) {
        while ($mech = $checkMech->fetchAll()) {
            for ($i = 0; $i < count($mech); $i++) {
                if (md5($password) == $mech[$i]['password']) {
                    echo $password;
                    setcookie("username", $username, time() + 7200);
                    header("Location: /cars");
                }
                else
                    header("Location: ../index.php");
            }
        }
    } else
        header("Location: ../index.php");

} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $username = "";
    if(isset($_COOKIE["username"]))
        $username = $_COOKIE["username"];
    ?>
    <style>
        body {
            margin: 0;
            background-color: silver;
            font-family: Georgia;
        }

        .login_table {
            border-spacing: 0;
            background-color: #fff;
            padding: 40px 30px;
            margin: auto;
            border: 3px solid lightgray;
            box-shadow: 0 19px 3px -9px #334;
            border-radius: 4px;
            margin-top: 4%; /*Now*/
        }

        .login_table tr td {
            padding: 5px;
        }

        .login_table tr td input[type="text"],
        .login_table tr td input[type="password"] {
            padding: 3px;
            font-size: 13px;
            border: 1px solid #999;
            width: 200px;
            outline: 0;
        }

        .login_table tr td input[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 5px;
            width: 80px;
            border: 1px solid #333;
            font-family: Georgia;
            border-radius: 3px;
        }
    </style>
    <form action="index.php" method="post">
        <table class="login_table">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username" value="<?php echo $username; ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" style="width: 100%" value="Login"></td>
            </tr>
        </table>
    </form>
    <?php
}