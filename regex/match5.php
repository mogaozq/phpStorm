<?php
echo "<pre>";
$string = file_get_contents("file4.txt");
var_dump(preg_match_all('/(?\'firstname\'\b\w+\b) (?\'lastname\'\b\w+\b)?\s+date: (?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})\s+time: (?<h>\d{2}):(?<m>\d{2}):(?<s>\d{2})/m', $string, $match));
echo "</pre>";
echo "<pre>";
print_r($match);
echo "</pre>";