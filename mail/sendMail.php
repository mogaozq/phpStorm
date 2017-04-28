<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-03-29
 * Time: 11:56 AM
 */
$to="mogaozq@gmail.com";
$subject="welcome";
$message ="i love you guy no musy";
$headers="From: totorbe <info@totorbe.ir>";//this email should be in host mails that prevent to be spam.
if(mail($to,$subject,$message,$headers)){
    echo "message was seccessfully sent.";
};
