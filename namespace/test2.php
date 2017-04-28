<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-04
 * Time: 10:40 PM
 */

use barbast\moga,barbast\dada;

include "test1.php";
include "test0.php";

echo $name;
echo "<br/>";
echo dada\DIR;//or moga\DIR
echo "<br/>";
echo dada\Animal::$className;//or  moga\...