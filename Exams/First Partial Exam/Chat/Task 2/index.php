<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    setcookie("username", $username, time() + 7200);
    setcookie("email", $email, time() + 7200);
    header("Location: /channels");
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    require_once("./config/connection.php");
    //Korisnikot e najaven
    if (isset($_COOKIE['username']) && isset($_COOKIE['email'])) {
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        ?>
        <form method="post" action="index.php">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" <?php echo "value='$email'"; ?>><br>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" <?php echo "value='$username'"; ?>><br>
            <button type="submit">Sign in</button>
        </form>
        <?php
    } else {
        ?>
        <form method="post" action="index.php">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email"><br>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username"><br>
            <button type="submit">Sign in</button>
        </form>
        <?php
    }
}