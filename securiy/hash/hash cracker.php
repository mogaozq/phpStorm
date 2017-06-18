<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-11
 * Time: 11:38 AM
 */


$hashedPass = sha1("5000");// just number
$time = time();
echo findhash1($hashedPass);
$time = time() - $time;
echo "<br/>";
echo date("s", $time);
function findhash1($hashedPass)
{
    for ($i = 0; $i < 999999999; $i++) {
        if (md5($i) == $hashedPass) {
            return $i + ' md5';
        } elseif (sha1($i) == $hashedPass) {
            return $i + ' sha1';
        }
    }
    return false;
}