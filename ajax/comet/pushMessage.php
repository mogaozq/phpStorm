<?php

define("MAX_TIMEOUT", 40000);

header("Content-Type: application/json");
if (isset($_GET['sId'], $_GET['rId'], $_GET['time'])) {
    $iterates = 0;
    $senderId = $_GET['sId'];
    $recieverId = $_GET['rId'];
    $time = $_GET['time'];
    $condition = "";
    $condition = "WHERE ((sender_id = $senderId AND  reciever_id = $recieverId) OR (sender_id = $recieverId AND  reciever_id = $senderId))";
    if ($time != 0) {
        $condition .= " AND message.createdAt > $time";
    }
    while (1) {
        $connection = new mysqli("localhost", "root", "", "chat db");
        $connection->set_charset("utf8");
        $result = $connection->query("SELECT * FROM `chat db`.message $condition ORDER BY createdAt ASC ;");
        if ($connection->affected_rows >= 1) {
            $json = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE);
            echo $json;
            exit();
        }
        sleep(1);
        $iterates++;
        if ($iterates == MAX_TIMEOUT) {
            echo "[]";
            exit();
        }
    }
} else {
    echo "[]";
}



