<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newsId = $_POST["newsId"];
    require_once("../config/connection.php");

    $newsTitle = "N/A";
    $newsDesc = "N/A";

    $query = "SELECT * FROM news.news WHERE news_id=" . $newsId;
    $news = $conn->query($query);

    $row = $news->fetchAll();
    $newsTitle = $row[0]['news_title'];
    $newsDesc = $row[0]['full_text'];
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <!-- @author Konstantin Bogdanoski (konstantin.b@live.com) -->
        <script rel="script" src="index.php"></script>
    </head>
<body>
<div>
    <div>
        <h1>
            <?= $newsTitle ?>
        </h1>
        <button onclick="window.location='http://localhost:8080/admin/admin.php'">Home Page</button>
        <p>
            <?= $newsDesc ?>
        </p>
    </div>
    <div>
        <h2>Comments</h2>

<?php
$query = "SELECT * FROM news.comments WHERE news_id=" . $newsId;
$comments = $conn->query($query);

if ($comments->rowCount() > 0)
    while ($comment = $comments->fetchAll())
        for ($i = 0; $i < count($comment); $i++)
            echo "<div>" . "<h3>" . $comment[$i]['author'] . "</h3>" . "<p>" . $comment[$i]['comment'] . "</p>" . "</div>";
else
    echo "NO COMMENTS";

echo "</div></div></body></html>";
?>