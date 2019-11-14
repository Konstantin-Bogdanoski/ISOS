<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab04 Task2</title>
    <!-- @author Konstantin Bogdanoski (konstantin.b@live.com) -->
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <label for="file">Your File:</label><br><br>
    <input id="file" name="file" type="file" required><br><br>
    <button type="submit">Submit File</button>
</form>
<?php
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['validated']) && $_POST['validated'] == 'true') {
        ?>
        <h1>All users have been validated!</h1><br>
        <?php
    } else {
        $file = $_FILES['file']["name"];
        if ($file != "") {
            move_uploaded_file($_FILES["file"]["tmp_name"], 'files/' . $_FILES['file']['name']);
            ?>
            <h1>You have uploaded a file!</h1><br>
            <?php
        } else {
            echo "<h1>You didn't upload any files</h1>";
            $handleLog = fopen("../log/log.txt", "a+");
            fputs($handleLog, "\n[UPLOAD] User didn't upload file");
            fclose($handleLog);
        }
    }
    ?>
    <form method="get" action="showusers">
        <button type="submit">Show Users</button>
    </form>
    <form method="get" action="validate">
        <button type="submit">Validate Users</button>
    </form>
    <form method="get" action="">
        <button type="submit">Upload another file</button>
    </form>
    <?php
}
?>
</body>
</html>
