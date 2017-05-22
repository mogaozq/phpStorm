<?php
if (isset($_POST['submit'])) {
    if ($_FILES['uploadedImage']['size'] != 0) {
        $type = $_FILES['uploadedImage']['type'];
        if (substr($type, 0, 5) == 'image') {
            createThumbnail();
//            if(saveToDb()){
//                echo "image has been saved seccessfully.";
//            }else{
//                echo "saving erorr.";
//            };
        } else {
            echo "plaese select a image file";
        }
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

echo "<br/>";
function createThumbnail()
{
    $fileAddresss = $_FILES["uploadedImage"]["tmp_name"];
    $mimeType = $_FILES['uploadedImage']['type'];
    $type = substr($mimeType, 6, 10);
    $mainImage = ("imagecreatefrom" . $type)($fileAddresss);
    if (isset($type)) {
        $width = imagesx($mainImage);
        $height = imagesy($mainImage);
        $thumbnailWidth = $width / 5;
        $thumbnailHeight = $height / 5;
        $thumbnail = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);
        imagecopyresampled($thumbnail, $mainImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $width, $height);
        $seccess = ("image" . $type)($thumbnail, "thumb.jpeg");
        imagedestroy($mainImage);
        imagedestroy($thumbnail);
        if ($seccess) {
            echo "thumbnail saved";
        } else {
            "an error occured";
        }

    } else {
        echo "file format not supported";
    }

}

function saveToDb()
{
    $imageData = file_get_contents($_FILES['uploadedImage']['tmp_name']);
    $connection = new mysqli("localhost", "root", "", "object1");
    $connection->set_charset("utf8");
    $stmt = $connection->stmt_init();
    $stmt->prepare("INSERT INTO object1 (image) VALUES (?);");
    $stmt->bind_param("s", $imageData);
    $stmt->execute();
    $stmt->store_result();// for save  affected rows


    if ($stmt->affected_rows == 1) {
        $stmt->close();
        $connection->close();
        return true;
    } else {
        $stmt->close();
        $connection->close();
        return false;
    }

}

?>
<form enctype="multipart/form-data" method="post">
    <input type="file" name="uploadedImage">
    <input type="submit" name="submit" value="upload">
</form>