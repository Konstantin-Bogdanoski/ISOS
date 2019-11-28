<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../config/connection.php");
    $author = $_POST['author'];
    $comment = $_POST['comment'];
    $approved = 0;
    $newsId = $_POST['newsId'];

    $query = "INSERT INTO news.comments (news_id, author, comment, approved) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$newsId, $author, $comment, $approved]);
    ?>

    <form id="form" method="post" action="../usersnews/index.php">
        <?php
        echo "<input type='hidden' value='$newsId' name='newsId'>";
        ?>
    </form>
    <script type="text/javascript">
        document.getElementById("form").submit();
    </script>

<?php }
$stmt->closeCursor();