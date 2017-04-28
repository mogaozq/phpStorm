<?php

var_dump($_FILES);
echo "<br/>";
$name = $_FILES['filooo']['name'];
$temp_name = $_FILES['filooo']['tmp_name'];
if(!file_exists('uploaded')){
    mkdir('uploaded');
}
move_uploaded_file($temp_name , 'uploaded/'.$name);
/**
 *
 * $Files contains arrays contains this keys:
 *
'name'
'type'
'tmp_name'
'error'
'size'
 */

echo "<br/>";
?>
<form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="file" name="filooo">
    <input type="submit" value="send" >
</form>