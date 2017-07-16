<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-09
 * Time: 12:36 PM
 */
$string = "Mohammad Barbast, Ali Sadeghi";
var_dump(preg_match_all('/(?<name>\w+) (?<lastname>\w+)/m', $string, $match));//instead of '/(?:(Sat)ur|(Sun))day/m'
echo "<pre>";
print_r($match);
echo "</pre>";
