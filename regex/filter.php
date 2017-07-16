<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-08
 * Time: 12:24 PM
 */
$array = ["my name is moga", "my name i sably", "something is wrong", "my name is dada"];
$result = preg_grep("/my name is \\w+/", $array);
echo "<pre>";
var_dump($result);
echo "</pre>";

