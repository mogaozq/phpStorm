<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-07-11
 * Time: 5:40 PM
 */
echo "<pre>";
print_r(array_flip(get_defined_constants(true)["pcre"])[preg_last_error()]);
echo "</pre>";