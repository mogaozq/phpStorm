<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-28
 * Time: 9:25 AM
 */

var_dump($_FILES);
echo "<br/>";
$name = $_FILES['moga']['name'];
$temp_name = $_FILES['moga']['tmp_name'];
if(!file_exists('uploaded')){
    mkdir('uploaded');
}
move_uploaded_file($temp_name , 'uploaded/'.$name);