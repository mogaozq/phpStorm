<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-27
 * Time: 10:57 PM
 */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/phpStorm/cURL/data.php");
curl_setopt($curl, CURLOPT_POST, true);
$postFields = array("user" => "mo ga", "pass" => "08525");
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postFields));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo "response:";
echo "<br/>";
echo $response;