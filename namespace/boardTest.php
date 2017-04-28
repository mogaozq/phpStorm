<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-05
 * Time: 10:42 AM
 */
spl_autoload_register("moga");
function moga($class_name)
{
    require_once("$class_name.php");
    echo $class_name . " seccessfully loaded.(moga)";
    echo "<br/>";
}

spl_autoload_register("sably");
function sably($class_name)
{
    require_once("$class_name.php");
    echo $class_name . " seccessfully loaded.(sably)";
    echo "<br/>";
}
var_dump(spl_autoload_functions());

echo "<br/>";
$board = new Board();
$board::showBoard();



//// autoload function
//function __autoload($class_name) {
//require_once("$class_name.php");
//}
