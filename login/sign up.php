<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-04
 * Time: 7:02 AM
 */
require_once '../mail/class.phpmailer.php';
require '../mail/PHPMailerAutoload.php';

$errors = array();
if (isset($_GET['signUp'])) {
    if (validate()) {
        insertToDatabase();
    }
}

?>
    <form action="sign%20up.php">
        firstname
        <input type="text" name="firstname" required>
        <br/>
        lasname
        <input type="text" name="lastname" required>
        <br/>
        email
        <input type="text" name="email" required>
        <br/>
        username
        <input type="text" name="username" required>
        <?php if (isset($errors['username'])) echo $errors['username'] ?>
        <br/>
        password
        <input type="text" name="password" required>
        <br/>
        retype password
        <input type="text" name="re_password" required>
        <?php if (isset($errors['rePass'])) echo $errors['rePass'] ?>
        <br/>
        <br/>
        <input type="submit" name="signUp" value="signUp">

    </form>

<?php
function validate()
{
    $pass = $_GET['password'];
    $rePass = $_GET['re_password'];

    if ($pass != $rePass) {
        global $errors;
        $errors['rePass'] = "re_password doesn't adapt.";
        return false;
    }
    return true;
}

function insertToDatabase()
{
    global $errors;
    $conn = new mysqli("localhost", "root", "", "university");
    $conn->set_charset("utf8");
    $username = $_GET['username'];
    $conn->query("SELECT * FROM university.stt_table WHERE stt_username = '$username'");
    if ($conn->affected_rows >= 1) {
        $errors['username'] = "this username already exists";
    } else {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['email'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        $security = rand(100000, 1000000);
        $conn->query("INSERT  INTO  stt_table (stt_firstname, stt_lastname, stt_email, stt_username, stt_password, security) VALUES ('$firstname' ,'$lastname' ,'$email' ,'$username' ,'$password' ,'$security' );");
        sendVerifyEmail($username, $email, $security);
        header("location: seccessfull sign up.php");
        echo $conn->affected_rows;
        echo "ok";
    }
    $conn->close();
}

function sendVerifyEmail($username, $email, $security)
{
    $mail = new PHPMailer();
    $mail->Subject = "Account Verification";
    $body = "hi $username <br/>activate your account via link below:<br/>." .
        "<a href='localhost/phpStorm/login/activate.php?username=$username&token=$security'>activate</a>";

    $mail->Body = $body;
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->setFrom("somethingelse@gmail.com", "moga");// when we use smtp this email is ignored, bun name is persisted.
    $mail->addAttachment("class.smtp.php", "smtp.php");
//---external smtp server:


    $mail->isSMTP();
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;
    $mail->Host = "mail.totorbe.ir";
    $mail->Port = 465;
    $mail->Username = "info@totorbe.ir";
    $mail->Password = "085252525";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

