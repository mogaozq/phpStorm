<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-03-30
 * Time: 11:24 AM
 */
require_once 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->Subject = "Excercise";
$mail->Body = "good things";
$mail->addAddress("mogaozq@gmail.com");
$mail->isHTML(true);
$mail->setFrom("info@totorbe.ir","totorbe");
$mail->addAttachment("class.smtp.php","smtp.php");

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}