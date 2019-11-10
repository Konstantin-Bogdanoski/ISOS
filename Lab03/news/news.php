<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET')
    readfile("news.html");
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../config/connection.php");
    $newsName = $_POST["newsName"];
    $newsDate = date('y-m-d H:i:s');
    $newsDesc = $_POST["newsDesc"];
    $query = "INSERT INTO news (news_title, full_text, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$newsName, $newsDesc, $newsDate]);
    header("Location: http://localhost:8080/admin/admin.php");
}