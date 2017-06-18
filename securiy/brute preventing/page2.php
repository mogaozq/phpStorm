<form action="login.php" method="post">
    <a href="page1.php">page1</a>
    <a href="page2.php">page2</a>
    <input type="submit" name="submit" value="logout">
</form>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    echo "welcome $username";
    echo "<br/>";
    echo "<br/>";
    echo "you can see your informaion here.";
    echo "<br/>";
    echo "information....☻";
} else {
    header("location: login.php?target=page2.php&passage=please log in first.");
}
?>
