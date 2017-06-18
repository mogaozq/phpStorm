<?php ob_start() ?>
<form action="login.php" method="post">
    <a href="page1.php">page1</a>
    <a href="page2.php">page2</a>
    <input type="submit" name="submit" value="logout">
</form>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    echo "welcome $username";
    echo "<br/>";
    echo "<br/>";
    echo "'$username' is good if you want to see all people with this name click <a>here</a>";
} else {
    header("location: login.php?target=posts.php&passage=please log in first.");
}
?>
