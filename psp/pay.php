<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-30
 * Time: 6:39 PM
 */
require_once ('functions.php');
$transition = sendData("test", 1005, "http://localhost/phpStorm/psp/redirect.php");
if ($transition['status']) {
    $api = "test";
    $transId = $transition['transId'];
    header("Location: https://pay.ir/payment/test/gateway/$transId");
}



