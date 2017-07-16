<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-08
 * Time: 12:13 PM
 */
echo "<pre>";
$string = file_get_contents("file0.txt");
var_dump(preg_replace('/<(\w+).*?>(.*)<\/\1>/m', '<\1>null</\1>', $string));
echo "</pre>";