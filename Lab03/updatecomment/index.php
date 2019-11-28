<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

$commentId = $_POST['commentId'];
$newsId = $_POST['newsId'];
$approved = $_POST['approved'];
require_once("../config/connection.php");

$approvedVal = $approved == "on" ? 1 : 0;

$query = "UPDATE news.comments SET approved=? WHERE comment_id=?";
$stmt = $conn->prepare($query);
$stmt->execute([$approvedVal, $commentId]);
$stmt->closeCursor();

?>

<form method="post" action="../news/index.php" id="form">
    <label>
        <input value="<?php echo $newsId ?>" name="newsId" hidden>
    </label>
</form>

<script type="text/javascript">
    document.getElementById("form").submit();
</script>
