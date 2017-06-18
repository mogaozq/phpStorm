<form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="file" name="file">
    <input type="submit" value="send">
</form>
<?php

if (!empty($_FILES)) {
    if (!file_exists('uploaded'))
        mkdir('uploaded');
    $name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $uploaded = move_uploaded_file($temp_name, 'uploaded/' . $name);
    if ($uploaded) {
        echo "<br/>";
        echo "uploaded seccessfully";
    }
}
/**
 *
 * $Files contains arrays contains this keys:
 *
 * 'name'
 * 'type'
 * 'tmp_name'
 * 'error'
 * 'size'
 */

?>
