<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-05
 * Time: 2:30 PM
 */

header("Content-Type: application/json");
if (isset($_GET['sId'], $_GET['rId'],$_GET['time'])) {
    $senderId = $_GET['sId'];
    $recieverId = $_GET['rId'];
    $time = $_GET['time'];
    $condition = "";
    $condition = "WHERE ((sender_id = $senderId AND  reciever_id = $recieverId) OR (sender_id = $recieverId AND  reciever_id = $senderId))";
    if ($time!=0) {
        $condition .= " AND message.createdAt > $time";
    }
    $connection = new mysqli("localhost", "root", "", "chat db");
    $connection->set_charset("utf8");
    $result = $connection->query("SELECT * FROM `chat db`.message $condition ORDER BY createdAt ASC ;");
    $json = json_encode($result->fetch_all(MYSQLI_ASSOC),JSON_UNESCAPED_UNICODE);
    echo $json;
    $connection->close();
    $result->free();

}else{
    echo "[]";
}
