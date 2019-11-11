<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

require_once("../config/connection.php");
readfile("admin.html");
$query = "SELECT * FROM news ORDER BY date DESC LIMIT 5";
$allNews = $conn->query($query);

if ($allNews->rowCount() > 0)
    while ($row = $allNews->fetchAll()) {
        for ($i = 0; $i < count($row); $i++) {
            $id = $row[$i]['news_id'];
            echo "<td class='newsID'>";
            echo $row[$i]['news_id'];
            echo "</td>";
            echo "<td class='newsDate'>";
            echo $row[$i]['date'];
            echo "</td>";
            echo "<td class='newsTitle'>";
            echo $row[$i]['news_title'];
            echo "</td>";
            echo "<td class='newsArticle'>";
            if (strlen($row[$i]['full_text']) > 100) {
                echo substr($row[$i]['full_text'], 0, 100);
                echo "<form method='post'>";
                echo "<input type='hidden' name='newsId' value='$id'>";
                echo "<button formaction='/news/index.php' value='$id' formmethod='post'>continue reading...</button>";
                echo "</form>";
            } else
                echo $row[$i]['full_text'];
            echo "</td>";

            $commentQry = " SELECT COUNT(*) FROM news.comments WHERE news_id=" . $id;
            $commentStmt = $conn->prepare($commentQry);
            $commentStmt->execute();
            $numComments = $commentStmt->fetchColumn();

            echo "<td class='newsComment''>";
            echo "<form method='post' action='../news/index.php'>";
            echo "<input type='hidden' name='newsId' value='$id'>";
            echo "<button formaction='/news/index.php' formmethod='post'>Comments ($numComments)</button>";
            echo "</form>";
            echo "</td>";

            echo "<td class='newsEdit''>";
            echo "<form method='get' action='../edit'>";
            echo "<input type='hidden' name='newsid' value='$id'>";
            echo "<button formaction='/edit' formmethod='get'>Edit</button>";
            echo "</form>";
            echo "</td>";
            echo "<td class='newsDelete'>";
            echo "<form method='post' action='../delete'>";
            echo "<input type='hidden' name='newsid' value='$id'>";
            echo "<button formaction='/delete' formmethod='post'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    }
echo "</table>";
echo "</div>";
echo "</body>";
echo "</html>";