<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-01
 * Time: 5:49 PM
 */
require_once("rest.inc.php");
if (isset($_GET['name'], $_GET['family'])) {
    echo urldecode($_GET['name']);
    echo "<br/>";
    echo urldecode($_GET['family']);
}

class moga extends Rest
{
    public $moga;
}