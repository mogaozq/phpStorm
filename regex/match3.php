<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-06
 * Time: 6:32 PM
 */
echo "<pre>";
$string = file_get_contents("file0.txt");
var_dump(preg_match_all('/^[A-Z]\w* [A-Z]\w*\r$/m', $string, $match));
echo "</pre>";
echo "<pre>";
var_dump($match);
echo "</pre>";