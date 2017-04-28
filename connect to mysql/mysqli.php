<?php
$connection = new mysqli("localhost", "root", "", "uni");
$connection->set_charset("utf8");
$result = $connection->query("SELECT * FROM uni.cot");
foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
    echo $row['CO_TITLE'];
    echo "<br/>";
}
echo $connection->affected_rows;
echo "<br/>";
echo $result->field_count;

$result->free();

