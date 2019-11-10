<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../config/connection.php");
    $newsId = $_POST["newsid"];
    $query = "DELETE FROM news where news_id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$newsId]);
    header("Location: http://localhost:8080/admin/admin.php");
}
