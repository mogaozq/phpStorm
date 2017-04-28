<?php
$conn = new PDO("mysql:host=localhost;dbname=uni;charset=utf8","root","");
$pdoResult = $conn->query("SELECT * FROM uni.cot WHERE CO_TYPE = 'تعوری' AND CO_CREDIT = 3");
while ($row = $pdoResult->fetch()){
    echo $row['CO_TITLE'];
    echo "<br/>";
}
echo  $pdoResult->rowCount();