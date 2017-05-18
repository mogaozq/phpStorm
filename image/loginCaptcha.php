<?php
session_start();
if (isset($_GET['submit'])) {
    if (isset($_GET['captcha'])) {
        if ($_SESSION['captcha'] == $_GET['captcha']) {
            $message = "ok";
        } else {
            $message = "entered code is incorrect";
        }
    } else {
        $message = "please enter code";
    }
}
?>
    <form method="get">
        <input type="text" name="username">
        <input type="text" name="password">
        <br/>
        <img src="capcha.php">
        <br/>
        <input type="text" name="captcha">
        <br/>
        <input type="submit" name="submit" value="login">
    </form>

<?php if (isset($message)) {
    echo $message;
}