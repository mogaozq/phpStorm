<?php
//ini_set("session.cookie_lifetime", 30);
session_start();
$errors = array();
if (isset($_GET["passage"])) {
    echo $_GET["passage"];
}
if (isset($_POST['submit']) && $_POST['submit'] == 'login') {
    $isLoggable = getUserLoginCertification(30, 5, 60);
    if (!$isLoggable) {
        echo "you cant login for now because of alot of uncorrect logging in. try 1 hour later";
        echo "<br/>";
    }
    showUserInfo($_POST['username'], $_POST['password']);
} elseif (isset($_POST['submit']) && $_POST['submit'] == 'logout') {
    session_unset();
    session_destroy();
    echo "you loged out seccessfully.";
    echo "<br/>";
    showloginForm();
} elseif (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    showUserInfo($username, $password);
} else {
    showloginForm();
}


function showloginForm()
{
    global $errors;
    if (isset($errors['brutal'])) {
        echo $errors['brutal'];
    } elseif (isset($errors['wrong'])) {
        echo $errors['wrong'];
    }
    ?>
    <form action="login.php<?php echo isset($_GET['target']) ? "?target=" . $_GET['target'] : ""; ?>" method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit" name="submit" value="login">
    </form>
    if you haven't an account sign up please.<br/>
    <a href="sign%20up.php">
        <input type="submit" name="signUp" value="sign up"/>
    </a>


    <?php
}

function showUserInfo($username, $password)
{
    global $errors;
    $userExist = false;
    $conn = new mysqli("localhost", "root", "", "test");
    $conn->set_charset("utf8");
    $username = $conn->escape_string($username);
    $salt = "#!qm%*mog";
    $hashedPassword = sha1($password . $salt);
    $query = "SELECT * FROM test.user WHERE username = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($query);
    if ($conn->affected_rows == 1) {
        $row = $result->fetch_assoc();
        $activated = $row['activated'];
        if ($activated == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            if (isset($_GET["target"])) {
                $target = $_GET['target'];
                header("location: $target");
            }
            $userExist = true;
            echo <<<EOT
<form action="login.php" method="post">
    <a href="posts.php">page1</a>
    <a href="informaiton.php">page2</a>
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
        $errors['wrong'] = "username or password is wrong!!";
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


/**
 * @param int $duration this parameter indates duration in seconds in which you want to count prior logins of this user.
 * @param int $numberOfLogin this is number of lawful logins that the user with a special ip can do in a $duration
 * @param int $unBlockTime if a user with a special ip use all of its lawful logins on $duration it then is blocked, and it will be unblocked after $unBlockTime;
 * @return bool
 */
function getUserLoginCertification($duration = 30, $numberOfLogin = 5, $unBlockTime = 60)
{
    if (isBlocked()) {
        if (lastLoginTillNow($duration) > $unBlockTime) {
            unBlockUser();
            return true;
        } else {
            return false;
        }
    } else {
        if (getLoginSpeed($duration) > $numberOfLogin) {
            blockUser();
            return false;
        } else {
            updateLoginTable($duration);
            return true;
        }

    }

}

function blockUser()
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = "UPDATE login SET blocked = 1 WHERE ip = '$ip'";
    $conn->query($query);
    if ($conn->affected_rows) {
        $ret = true;
    } else {
        $ret = false;
    };
    $conn->close();
    return $ret;
}

function unBlockUser()
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $conn->query("UPDATE login SET blocked = 0 WHERE ip = '$ip'");
    if ($conn->affected_rows) {
        $ret = true;
    } else {
        $ret = false;
    };
    $conn->close();
    return $ret;
}

function isBlocked()
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = "SELECT * FROM login WHERE ip='$ip' AND login.blocked =1";
    $result = $conn->query($query);
    if ($result->num_rows) {
        $ret = true;
    } else {
        $ret = false;
    }
    $result->free();
    $conn->close();
    return $ret;
}

function updateLoginTable($duration = 30)
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = time();
    $conn->begin_transaction();
    $conn->query("INSERT INTO login (ip, log_time) VALUES ('$ip', $time);");
    $time = time() - $duration;
    $conn->query("DELETE FROM login WHERE log_time < $time");
    $conn->commit();
    $conn->close();
}

function lastLoginTillNow($duration = 30)
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = "SELECT * FROM login WHERE ip='$ip'  ORDER BY log_time DESC LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows) {
        $now = time();
        $lastLoginTime = ($result->fetch_assoc())['log_time'];
        $ret = $now - $lastLoginTime;
    } else {
        $ret = $duration + 1;
    }
    $result->free();
    $conn->close();// connection will close automatically after this script run out ☻.
    return $ret;
}

function getLoginSpeed($duration = 30)
{
    $conn = new mysqli("localhost", "root", "", "test");
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = time() - $duration;
    $query = "SELECT ip FROM login WHERE ip='$ip' AND log_time > $time;";
    $result = $conn->query($query);
    $ret = $result->num_rows;
    $result->free();
    $conn->close();
    return $ret;

}


?>