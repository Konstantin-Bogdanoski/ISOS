<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    require_once("../config/connection.php");
    $channelID = $_GET['channel-id'];
    $query = "SELECT * FROM message WHERE channel_id=? ORDER BY time_sent ASC";
    $msgs = $conn->prepare($query);
    $msgs->execute([$channelID]);
    ?>
    <h1><?php echo $channelID?></h1>
    <button onclick="location.href='/channels'">Channels</button>
    <div class="container">
    <?php
    if ($msgs->rowCount() > 0){
        $username = $_COOKIE['msguser'];
        while ($msg = $msgs->fetchAll()){
            for ($i = 0; $i < count($msg); $i++) {
                if($username != $msg[$i]['sender_username']){
                    $query = "UPDATE message SET is_read=true WHERE sender_username=?";
                    $exec = $conn->prepare($query);
                    $exec->execute([$msg[$i]['sender_username']]);
                }
                ?>
                <div style="border: 1px solid black">
                    <div style="width: 20%; display: inline">
                         <?php echo $msg[$i]['sender_username'] ?>
                    </div>
                    <div style="width: 20%; display: inline">
                         <?php echo $msg[$i]['time_sent'] ?>
                    </div>
                    <div style="width: 60%; display: inline">
                         <?php echo $msg[$i]['message_text'] ?>
                    </div>
                    </div>
                <?php
            }
        }
        $username = "";
        $email = "";
        if(isset($_COOKIE['msguser']) && isset($_COOKIE['msgemail'])){
            $username = $_COOKIE['msguser'];
            $email = $_COOKIE['msgemail'];
        }
        ?>
        <form method="post" action="">
        <input name="channel_id" value="<?php echo $channelID ?>" hidden>
        <label for="username">Username:</label><br>
        <input id="username" type="text" name="username" value="<?php echo $username ?>" required><br>
        <label for="email">Email:</label><br>
        <input id="email" type="text" name="email" value="<?php echo $email ?>" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <button type="submit">Send</button>
        </form>
<?php
    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once ("../config/connection.php");
    $username = $_POST['username'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $channelID = $_POST['channel_id'];
    $time = date('y-m-d H:i:s');
    if(!isset($_COOKIE['msguser']) || !isset($_COOKIE['msgemail'])){
        setcookie("msguser", $username, time() + 7200);
        setcookie("msgemail", $email, time() + 7200);
    }
    $query = "INSERT INTO message (message_text, sender_username, sender_email, channel_id, time_sent) VALUES (?, ?, ?, ?, ?)";
    $insert = $conn->prepare($query);
    $insert->execute([$message, $username, $email, $channelID, $time]);
    header("Location: /channel?channel-id=".$channelID);
}
