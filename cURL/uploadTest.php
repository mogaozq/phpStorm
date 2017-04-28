<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-28
 * Time: 9:22 AM
 */
$curlFile = new CURLFile('C:\wamp64\www\phpStorm\cURL\notes.txt','text/plain' );
$file = array("moga" => $curlFile);
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"http://localhost/phpStorm/cURL/upload.php");
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$file);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
$resoponse = curl_exec($curl);
curl_close();
if ($resoponse){
    echo "uploaded seccessfully";
}else{
    echo "uploading error: ".curl_error($curl);
}
echo "<br/>";
echo "<br/>";
echo  $resoponse;