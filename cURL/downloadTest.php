<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-28
 * Time: 10:51 AM
 */
$fileUrl = "http://localhost/phpStorm/cURL/car.jpg";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $fileUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resoponse = curl_exec($curl);
curl_close($curl);
if (!file_exists("downloaded")) {
    mkdir("downloaded");
} else {
    if ($resoponse) {
        $file = fopen("downloaded/down." . pathinfo($fileUrl)["extension"], "w");
        fputs($file, $resoponse);
        fclose($file);
        echo "file downloaded.";
    }else{
        echo "downlaod error:".curl_error($curl);
    }
}