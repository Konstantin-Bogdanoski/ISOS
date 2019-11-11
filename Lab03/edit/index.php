<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$newsTitle = null;
$newsDesc = null;
$newsId = null;
require_once("../config/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['newsName'];
    $newDesc = $_POST['newsDesc'];
    $newsId = $_POST['newsId'];
    var_dump($newName);
    var_dump($newDesc);
    var_dump($newsId);
    $query = "UPDATE news.news SET full_text=:newDesc, news_title=:newName WHERE news_id=:newsId";
    $stmt = $conn->prepare($query);
    $stmt->execute(["newDesc" => $newDesc, "newName" => $newName, "newsId" => $newsId]);
    header("Location: http://localhost:8080/admin/admin.php");
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $newsId = $_GET["newsid"];
    $query = "SELECT * FROM news where news_id=" . $newsId;
    $news = $conn->query($query);
    if ($news->rowCount() > 0) {
        $row = $news->fetchAll();
        $newsTitle = $row[0]['news_title'];
        $newsDesc = $row[0]['full_text'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin News Panel</title>
    <!-- @author Konstantin Bogdanoski (konstantin.b@live.com) -->
</head>
<body>
<div>
    <h1>Admin EDIT Panel</h1>
</div>
<div>
    <form action="/edit" method="post">
        <table>
            <tr>
                <td>
                    <label for="newsName">Naslov na novosta:</label>
                </td>
                <td>
                    <input type="hidden" name="newsId" value="<?= $newsId ?>">
                    <input type="text" id="newsName" name="newsName" value="<?= $newsTitle ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newsDesc">Celosen tekst na novosta:</label>
                </td>
                <td>
                    <textarea name="newsDesc" id="newsDesc" rows="4" cols="40" required><?= $newsDesc ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
