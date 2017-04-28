<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-03-30
 * Time: 11:24 AM
 */
require_once 'class.phpmailer.php';
require 'PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->Subject = "Excercise";
$mail->Body = "good things";
$mail->addAddress("mohammad.barbast@gmail.com");
$mail->isHTML(true);
$mail->setFrom("somethingelse@gmail.com","moga");// when we use smtp this email is ignored, bun name is persisted.
$mail->addAttachment("class.smtp.php", "smtp.php");
//---external smtp server:


//$mail->isSMTP();
//$mail->SMTPSecure = "ssl";
//$mail->SMTPAuth = true;
//$mail->Host = "mail.totorbe.ir";
//$mail->Port = 465;
//$mail->Username="info@totorbe.ir";
//$mail->Password= "085252525";

$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username="mogaozq@gmail.com";
$mail->Password= "085252525";
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}