<?php
echo "<pre>";
$string = file_get_contents("file5.txt");
var_dump(preg_match_all('/(sably|moga|dada) (has to|should) (learn|go),(?1) (?2) \3 too/m', $string, $match, PREG_SET_ORDER | PREG_OFFSET_CAPTURE));// default is PREG_PATTERN_ORDER
/*
 * \( ( (?>[^()]+) | (?R) )* \)  recursive
 */
echo "</pre>";
echo "<pre>";
print_r($match);
echo "</pre>";
