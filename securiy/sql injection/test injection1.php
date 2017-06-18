<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-09
 * Time: 10:59 AM
 */
if (isset($_GET['senderId']) && is_numeric($_GET['senderId'])/*preventing sql injection via a number(we can use prestatement of mysql)*/) {
    $conn = new mysqli("localhost", "root", "", "chat db");
    $conn->set_charset("utf8");
    $senderId = $_GET['senderId'];
    $query = "SELECT * from message WHERE sender_id = $senderId";
    echo "<pre>";
    var_dump($query);
    echo "</pre>";
    $result = $conn->query($query);
    if ($result->num_rows) {
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        $result->free();
    } else {
        $ret = false;
    }
    echo "<pre>";
    var_dump($ret);
    echo "</pre>";
    $conn->close();
}