<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-05
 * Time: 5:07 PM
 */
if (isset($_GET['sId'], $_GET['rId'], $_GET['message'])) {
    $senderId = $_GET['sId'];
    $recieverId = $_GET['rId'];
    $message = $_GET['message'];
    $now = time();
    $connection = new mysqli("localhost", "root", "", "chat db");
    $connection->set_charset("utf8");
    $result = $connection->query("INSERT INTO message (sender_id,reciever_id,message,createdAt) VALUES ($senderId, $recieverId, $message, $now);");
    if ($connection->affected_rows == 1) {
        echo "1";
    } else {
        echo "0";
    }

}