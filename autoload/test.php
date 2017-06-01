<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-28
 * Time: 3:34 PM
 */
spl_autoload_register("moga_autoload");
spl_autoload_register("moga2_autoload");
function moga_autoload($name)
{
    echo $name;
    echo " moga";
    echo "<br/>";
    include_once('../oop/Car.php');
}

function moga2_autoload($name)
{
    echo $name;
    echo " moga2";
    echo "<br/>";
}


$car = new Car("x33", "323");
var_dump($car);
echo mogaa();