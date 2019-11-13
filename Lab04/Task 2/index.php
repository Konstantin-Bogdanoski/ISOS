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
        <label for="file">Your File:</label><br>
        <input id="file" name="file" type="file" required><br>
        <button type="submit">Submit File</button>
    </form>
    </body>
    </html>
    <?php
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file']["name"];
    if ($file != "") {
        move_uploaded_file($_FILES["file"]["tmp_name"], 'files/' . $_FILES['file']['name']);
        $handleInput = fopen("files/" . $file, "r") or die("Unable to open uploaded file");
        ?>
        <h1>You have uploaded a file!</h1><br>
        <button formaction="/showusers" formmethod="get">Show Users</button>
        <button formaction="/validate" formmethod="get">Validate Users</button>
        <?php
    } else
        echo "<h1>You didn't upload any files</h1>";
}
?>