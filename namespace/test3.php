<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-04
 * Time: 10:40 PM
 */

use barbast\moga as mog, barbast\dada as dad;

include "test1.php";
include "test0.php";

echo $name;
echo "<br/>";
echo dad\DIR;//or moga\DIR
echo "<br/>";
echo dad\Animal::$className;