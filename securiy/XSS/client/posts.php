<?php ob_start() ?>
<form action="login.php" method="post">
    <a href="posts.php">posts</a>
    <a href="informaiton.php">user info</a>
    <input type="submit" name="submit" value="logout">
</form>
<?php
session_start();
if (isset($_GET['message']) && isset($_SESSION["username"])) {
    $hasSent = insertMessageToDb($_GET['message'], $_SESSION["username"]);
    if ($hasSent) {
        echo "your message has sent seccessfully.";
    }


}
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    echo "welcome $username";
    echo "<br/>";
    echo "<br/>";
    echoUserPosts();
    echoPostForm();
} else {
    header("location: login.php?target=posts.php&passage=please log in first.");
}
function echoUserPosts()
{
    $conn = new mysqli("localhost", "root", "", "test");
    $conn->set_charset("utf8");
    $result = $conn->query("SELECT username,message FROM test.user JOIN test.post ON user.id=post.user_id;");
    if ($result->num_rows) {
        echo "<br/>";
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
            $username = htmlspecialchars($row['username']);
            $message = htmlSpecialChars($row['message']);
            echo "<h2>$username</h2>";
            echo "<br/>";
            echo $message;
            echo "<br/>";

        }
    }
    $result->free();
    $conn->close();
}

function echoPostForm()
{
    echo <<<Str
<form>
<input type="text" name="message" />
<input type="submit" name"submit" value="send" />
</form>

Str;

}

function insertMessageToDb($message, $username)
{
    $conn = new mysqli("localhost", "root", "", "test");
    $conn->set_charset("utf8");
    $user_id = getUserId($username);
    $message = $conn->escape_string($message);
    $conn->query("INSERT INTO post (user_id,message) VALUES ($user_id,'$message')");
    if ($conn->affected_rows) {
        $ret = true;
    } else {
        $ret = false;
    }
    $conn->close();
    return $ret;
}

function getUserId($username)
{
    $conn = new mysqli("localhost", "root", "", "test");
    $conn->set_charset("utf8");
    $result = $conn->query("SELECT id FROM test.user WHERE username = '$username'");
    if ($result->num_rows) {
        $ret = ($result->fetch_assoc())['id'];
    } else {
        $ret = -1;
    }
    $result->free();
    $conn->close();
    return $ret;
}

?>
