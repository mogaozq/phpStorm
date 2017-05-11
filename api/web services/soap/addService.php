<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-08
 * Time: 10:46 AM
 */
$soap = new SoapServer(null, array("uri" => "http://localhost/phpStorm/api/web%20services/soap/addService.php"));
$soap->addFunction("add");
$soap-> addFunction("subtract");
$soap->handle();
function add($a, $b)
{
    return $a + $b;
}
function subtract($a, $b){
    return $a-$b;
}
