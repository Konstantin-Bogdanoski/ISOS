<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../config/connection.php");
    $commentId = $_POST['commentId'];
    $newsId = $_POST['newsId'];
    $query = "DELETE FROM news.comments WHERE comment_id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$commentId]);
    ?>

    <form id="form" method="post" action="../news/index.php">
        <?php
        echo "<input type='hidden' value='$newsId' name='newsId'>";
        ?>
    </form>
    <script type="text/javascript">
        document.getElementById("form").submit();
    </script>

<?php }
$stmt->closeCursor();