<?php
$connection = new mysqli("localhost","root","","uni");
$connection->set_charset("utf8");
$stmt= $connection->stmt_init();
$stmt->prepare("SELECT * FROM uni.cot WHERE CO_TYPE = ? AND CO_CREDIT = ?");
$stmt->bind_param("si",$type,$credit);
$stmt->bind_result($coId,$coTitle,$coCredit,$coType);
$type = "تعوری";
$credit = 3;
$stmt->execute();
$stmt->store_result();// for save  affected rows
while ($stmt->fetch()){
    echo $coId." ".$coTitle." ".$coCredit." ".$coType;
    echo "<br/>";
}
echo $stmt->affected_rows;
$stmt->close();
$connection->close();