<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-08
 * Time: 12:17 PM
 */
$data = file_get_contents("file3.txt");
echo "<pre>";
var_dump(preg_split('/\s*,\s*|\s+and\s+/', $data));
echo "</pre>";