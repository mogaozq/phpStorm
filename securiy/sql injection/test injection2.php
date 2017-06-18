<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-09
 * Time: 10:59 AM
 */
if (isset($_GET['senderName'])/*preventing sql injection via a number*/) {
    $conn = new mysqli("localhost", "root", "", "chat db");
    $conn->set_charset("utf8");
    $senderName = $conn->escape_string($_GET['senderName']);// use to prevent sql injection (we can use prestatement of mysql)
    $query = "SELECT * from message JOIN `chat db`.person ON message.sender_id=person.id WHERE name = '$senderName'";
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