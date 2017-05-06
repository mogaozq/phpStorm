<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-02
 * Time: 11:02 PM
 */

/**
 * @param $api
 * @param $amount
 * @param $redirect
 * @param null $factorNumber
 * @return bool|mixed returns an assoc array of (status, errorCode, errorMessage)
 */


function sendData($api, $amount, $redirect, $factorNumber = null)
{
    $data = "api=$api&amount=$amount&redirect=$redirect&factorNumber=$factorNumber";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://pay.ir/payment/test/send");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        return json_decode($response, true);
    } else {
        return false;
    }

}

/**
 * @param $api
 * @param $transId
 * @return bool|mixed contains (status) and (amount) of transition in array.
 */
function verify($api,$transId){
    $data="api=$api&transId=$transId";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://pay.ir/payment/test/verify");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        return json_decode($response, true);
    } else {
        return false;
    }
}