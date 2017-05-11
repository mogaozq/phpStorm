<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-08
 * Time: 10:53 AM
 */
$client = new SoapClient(null, array("uri" => "http://localhost/phpStorm/api/web%20services/soap/addService.php",
    "location" => "http://localhost/phpStorm/api/web%20services/soap/addService.php"));
echo $client->add(12, 34);
echo "<br/>";
echo $client->subtract(12, 3);

