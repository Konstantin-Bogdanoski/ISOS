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
        <button onclick="window.location='http://localhost:8080/users/users.php'">Home Page</button>
        <p>
            <?= $newsDesc ?>
        </p>
    </div>
    <div>
        <h2>Comments</h2>

        <?php
        $query = "SELECT * FROM news.comments WHERE news_id=" . $newsId . " AND comments.approved=1";
        $comments = $conn->query($query);

        if ($comments->rowCount() > 0)
            while ($comment = $comments->fetchAll())
                for ($i = 0; $i < count($comment); $i++)
                    echo "<div style='border: #A40808 2px solid; padding: 10px; margin: 10px; width: 50%'>" . "<h3>" . $comment[$i]['author'] . "</h3>" . "<p>" . $comment[$i]['comment'] . "</p></div>";
        else
            echo "NO COMMENTS";
        ?>
    </div>
    <div style="border: solid 2px black; padding: 10px; margin: 10px; width: 50%">
        <form method="post" action="../addcomment">
            <?php
            echo "<input type='hidden' value='$newsId' name='newsId'>";
            ?>
            <label for="author">Author</label><br>
            <input type="text" name="author" id="author" placeholder="Author"><br>
            <label for="comment">Comment</label><br>
            <textarea name="comment" id="comment" placeholder="Comment" rows="5" cols="40"
                      style="width: 100%"></textarea>
            <br>
            <button type="submit">Add Comment</button>
        </form>
    </div>
</div>
</body>
</html>
