<?php
$conn = mysqli_connect("localhost", "root", "", "test");
$conn->set_charset("utf8");
$conn->begin_transaction();
$conn->query("update object2 SET length = length +10 WHERE id= 1");
$conn->query("update object2 SET length = length -10 WHERE id= 2");
//$conn->rollback();
$conn->commit();
//$conn->autocommit()