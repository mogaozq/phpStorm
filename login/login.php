<?php
//ini_set("session.cookie_lifetime", 30);
session_start();
echo "<br/>";
if (isset($_GET["passage"])) {
    echo $_GET["passage"];
}
if (isset($_POST['submit']) && $_POST['submit'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userExist = showUserInfo($username, $password);
    if ($userExist) {
        echo "<br/>";
        showLogoutButton();
    }
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
    echo "<br/>";
    showLogoutButton();
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
    </form>
    <form action="sign%20up.php">
        if you haven't an account sign up please.<br/>
        <input type="submit" name="signUp" value="sign up">
    </form>


    <?php
}

function showUserInfo($username, $password)
{
    $userExist = false;
    $conn = new mysqli("localhost", "root", "", "university");
    $conn->set_charset("utf8");
    $result = $conn->query("SELECT * FROM university.stt_table WHERE stt_username = '$username' AND stt_password = '$password'");
    if ($conn->affected_rows == 1) {
        $row = $result->fetch_assoc();
        $enabled = $row['enabled'];
        if ($enabled == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            if (isset($_GET["target"])) {
                $target = $_GET['target'];
                header("location: $target");
            }
            $userExist = true;
            echo "welcome $username";
            echo "<br/>";
            echo "نام و نام خانوادگی:";
            echo "<br/>";
            echo $row['stt_firstname'] . " " . $row['stt_lastname'];
            echo "<br/>";
            echo "شماره دانشجویی:";
            echo "<br/>";
            echo $row['stt_id'];
        } elseif ($enabled == 0) {
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