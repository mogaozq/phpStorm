<?php
if (isset($_POST['submit'])) {
    if($_FILES['filooo']['size']!=0){
        $type = $_FILES['filooo']['type'];
        if(substr($type,0,5)=='image'){
            if(saveToDb()){
                echo "image has been saved seccessfully.";
            }else{
                echo "saving erorr.";
            };
        }else{
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
function saveToDb(){
    $imageData = file_get_contents($_FILES['filooo']['tmp_name']);
    $connection = new mysqli("localhost","root","","university");
    $connection->set_charset("utf8");
    $stmt= $connection->stmt_init();
    $stmt->prepare("INSERT INTO university.image_table (image) VALUES (?);");
    $stmt->bind_param("s",$imageData);
    $stmt->execute();
    $stmt->store_result();// for save  affected rows

    if($stmt->affected_rows==1){
        $stmt->close();
        $connection->close();
        return true;
    }else{
        $stmt->close();
        $connection->close();
        return false;
    }


}
?>
<form enctype="multipart/form-data" action="image.php" method="post">
    <input type="file" name="filooo">
    <input type="submit" name="submit" value="upload">
</form>