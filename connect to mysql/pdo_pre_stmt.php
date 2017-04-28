<?php
$conn = new PDO("mysql:host=localhost;dbname=uni;charset=utf8","root","");
$stmt = $conn ->prepare("SELECT * FROM uni.cot WHERE CO_TYPE = ? AND CO_CREDIT = ?");
$stmt->execute(array('تعوری', 2));
while ($row = $stmt->fetch()){
    echo $row['CO_TITLE'];
    echo "<br/>";
}
echo  $stmt->rowCount();
$stmt->closeCursor();

