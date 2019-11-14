<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
include "../users/User.php";
$files = scandir('../files/');
$handleLog = fopen("../log/log.txt", "a+");
$invalidFiles = [];
$validity = true;
foreach ($files as $file) {
    $handleFile = fopen("../files/" . $file, "r");
    if ($handleFile) {
        while (($line = fgets($handleFile)) !== false) {
            $columns = explode(";", $line);
            $userName = $columns[0];
            $userPhone = $columns[1];
            $userAddr = $columns[2];
            $user = new User($userName, $userPhone, $userAddr);
            if (!$user->isValid()) {
                $validity = false;
                echo "<p><strong>USER</strong>: " . $line . " <strong>NOT VALID</strong> FROM FILE <strong>" . $file . "</strong>";
                echo "</p>";
                fputs($handleLog, "\n[VALID] User not valid - Line: " . $line . " | File: " . $file);
                array_push($invalidFiles, $file);
                array_unique($invalidFiles);
            }
        }
    } else {
        fputs($handleLog, "\n[ERROR] Error while opening file: " . $file);
    }
}

if ($validity) {
    ?>
    <form id="form" method="post" action="../">
        <input type="hidden" name="validated" value="true">
    </form>
    <script type="text/javascript">
        document.getElementById("form").submit();
    </script>
    <?php
} else {
    echo "<h1>Invalid files:</h1>";
    echo "<form method='post' action='../remove'>";
    $invalidFilesUnique = array_unique($invalidFiles);
    foreach ($invalidFilesUnique as $file) {
        echo "<span style='padding: 5px; margin: 5px;'>$file</span>";
        echo "<input type='hidden' name='remove[]' value='$file'>";
    }
    ?>
    <br><br><br>
    <button type="submit">(CAUTION) Remove invalid files (CAUTION)</button>
    </form>
    <?php
}