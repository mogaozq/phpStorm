<?php ob_start() ?>
<form action="login.php" method="post">
    <a href="posts.php">posts</a>
    <a href="informaiton.php">user info</a>
    <input type="submit" name="submit" value="logout">
</form>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    echo "welcome $username";
    echo "<br/>";
    echo "<br/>";
    echo "you can see your informaion here.";
    echo "<br/>";
    echo "information....☻";
} else {
    header("location: login.php?target=informaiton.php&passage=please log in first.");
}
?>
