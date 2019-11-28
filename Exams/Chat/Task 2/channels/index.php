<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

require_once("../config/connection.php");
$query = "
SELECT channel.channel_id, name, description, unread 
FROM ( 
    SELECT channel_id, COUNT(message_id) AS unread 
    FROM message 
    WHERE is_read=false 
    GROUP BY channel_id
    ) as mu RIGHT JOIN channel ON channel.channel_id=mu.channel_id
    ORDER BY unread DESC
    ";
$channels = $conn->query($query);
if ($channels->rowCount() > 0) {
    ?>
    <h1>Channels</h1>
    <table style="border: 2px solid black">
    <thead style="border: 2px solid black">
    <tr style="border: 2px solid black">
        <th style="border: 2px solid black">
            ID
        </th>
        <th style="border: 2px solid black">
            Name
        </th>
        <th style="border: 2px solid black">
            Description
        </th>
        <th style="border: 2px solid black">
            Unread Messages
        </th>
    </tr>
    </thead>
    <?php
    while($channel = $channels->fetchAll()){
        for($i=0; $i<count($channel); $i++){
            ?>
            <tr style="border: 1px solid black">
            <td style="border: 1px solid black">
            <?php echo $channel[$i]['channel_id'] ?>
            </td>
            <td style="border: 1px solid black">
            <a href="/channel?channel-id=<?php echo $channel[$i]['channel_id']?>"><?php echo $channel[$i]['name'] ?></a>
            </td>
            <td style="border: 1px solid black">
            <?php echo $channel[$i]['description'] ?>
            </td>
            <td style="border: 1px solid black">
            <?php echo $channel[$i]['unread'] > 0 ? $channel[$i]['unread'] : 0 ?>
            </td>
            </tr>
            <?php
        }
    }
}
