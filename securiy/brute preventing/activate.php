<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-04
 * Time: 4:07 PM
 */
if (isset($_GET['username'], $_GET['token'])) {
    $username = $_GET['username'];
    $security = $_GET['token'];
    $connection = new mysqli("localhost", "root", "", "university");
    $connection->set_charset("utf8");
    $connection->query("UPDATE stt_table SET enabled = 1 WHERE stt_username ='$username' AND security = $security ;");
    if ($connection->affected_rows == 1) {
        echo "your account has seccessfully activated.";
    } else {
        "your request is invalid.";
    }
    $connection->close();
}


