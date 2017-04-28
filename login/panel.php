<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    echo "welcome $username";
    echo "<br/>";
    echo "<br/>";
    echo ".......................";
} else {
    header("location: login.php?target=panel.php&passage=please log in first.");
}
?>
