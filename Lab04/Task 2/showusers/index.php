<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
include "../users/User.php";
readfile("index.html");
$files = scandir('../files/');
$handleLog = fopen("../log/log.txt", "a+");

foreach ($files as $file) {
    $handleFile = fopen("../files/" . $file, "r");
    if ($handleFile) {
        while (($line = fgets($handleFile)) !== false) {
            $columns = explode(";", $line);
            $userName = $columns[0];
            $userPhone = $columns[1];
            $userAddr = $columns[2];
            if (isset($userName) && isset($userPhone) && isset($userAddr)) {
                $user = new User($userName, $userPhone, $userAddr);
                ?>
                <tr>
                    <td class="name">
                        <?php echo $user->getName() ?>
                    </td>
                    <td class="number">
                        <?php echo $user->getPhone() ?>
                    </td>
                    <td class="address">
                        <?php echo $user->getAddress() ?>
                    </td>
                    <td class="address">
                        <?php echo($user->isValid() == true ? "YES" : "NO") ?>
                    </td>
                </tr>
                <?php
            } else
                fputs($handleLog, "\n[PARSE] Error while parsing user: " . $line);
        }
    } else {
        fputs($handleLog, "\n[ERROR] Error while opening file: " . $file);
    }
    fclose($handleFile);
}
fclose($handleLog);
?>
</table>
</div>
</body>
</html>