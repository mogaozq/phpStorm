<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-06
 * Time: 6:32 PM
 */

//$string = "Sunday";
$string = "bcbc";
//var_dump(preg_match_all('/(?|(Sat)ur|(Sun))day/m',$string,$match));//instead of '/(?:(Sat)ur|(Sun))day/m'
var_dump(preg_match_all('/(a|(bc))\2/m', $string, $match));//instead of '/(?:(Sat)ur|(Sun))day/m'
echo "<pre>";
print_r($match);
echo "</pre>";
