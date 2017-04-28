<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-26
 * Time: 3:29 PM
 */
$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, "http://localhost/phpStorm/cURL/moga.php");
curl_setopt($curl, CURLOPT_URL, "www.google.com");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_NOBODY, true);

$data = curl_exec($curl);
//var_dump($data);
echo $data;