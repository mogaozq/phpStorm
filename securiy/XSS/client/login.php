<?php
//ini_set("session.cookie_httponly",true);
session_start();
ob_start();
if (isset($_POST['submit']) && $_POST['submit'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userExist = showUserInfo($username, $password);
    if ($userExist
        && isset($_POST['remember'])
        && $_POST['remember'] == 1
    ) {
        setcookie("remember", $username, time() + (3600 * 24 * 365), "/"/*else doesn't work*//*,null,null,true*/);
    }
} elseif (isset($_POST['submit']) && $_POST['submit'] == 'logout') {
    session_unset();
    session_destroy();
    setcookie(session_name(), session_id(), time() - 100, "/");
    setcookie("remember", "", time() - 1, "/");
    echo "you loged out seccessfully.";
    echo "<br/>";
    showloginForm();
} elseif (isset($_SESSION["username"])) {
    showUserInfo($_SESSION["username"]);
} elseif (isset($_COOKIE['remember'])) {
    showUserInfo($_COOKIE["remember"]);
} else {
    showloginForm();
}


function showloginForm()
{
    ?>
    <form action="login.php<?php echo isset($_GET['target']) ? "?target=" . $_GET['target'] : ""; ?>" method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit" name="submit" value="login">
        <br>remember me
        <input type="checkbox" name="remember" value="1">
    </form>
    if you haven't an account sign up please.<br/>
    <a href="sign%20up.php">
        <input type="submit" name="signUp" value="sign up"/>
    </a>


    <?php
}


function showUserInfo($username, $password = '124!@#$!#$')
{
    $userExist = false;
    $conn = new mysqli("localhost", "root", "", "test");
    $conn->set_charset("utf8");
    $username = $conn->escape_string($username);
    $salt = "#!qm%*mog";
    $hashedPassword = sha1($password . $salt);
    if ($password == "124!@#$!#$")
        $query = "SELECT * FROM test.user WHERE username = '$username'";
    else
        $query = "SELECT * FROM test.user WHERE username = '$username' AND password = '$hashedPassword'";

    $result = $conn->query($query);
    if ($conn->affected_rows == 1) {
        $row = $result->fetch_assoc();
        $activated = $row['activated'];
        if ($activated == 1) {
            $_SESSION["username"] = $username;
            if (isset($_GET["target"])) {
                $target = $_GET['target'];
                header("location: $target");
            }
            $userExist = true;
            echo <<<EOT
<form action="login.php" method="post">
    <a href="posts.php">posts</a>
    <a href="informaiton.php">user info</a>
    <input type="submit" name="submit" value="logout">
</form>
<h1>welcome $username</h1>
<h2>This is main page ....</h2>
EOT;
        } elseif ($activated == 0) {
            echo "your account is not verified.";
            $userExist = false;
        }

    } else {
        echo "username or password is wrong!!";

        echo "<br/>";
        showloginForm();
    }
    $result->free();
    $conn->close();
    return $userExist;
}

function showLogoutButton()
{
    ?>
    <form action="login.php" method="post">
        <input type="submit" name="submit" value="logout">
    </form>

    <?php
}

?>