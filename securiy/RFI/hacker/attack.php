<?php // this code will execute in attackers server and is not useful.see include functionality to find out.
echo __LINE__;
$conn = new mysqli("localhost", "moga", "bb", "");
$result = $conn->query("show  databases");
foreach ($result->fetch_all() as $db) {
    echo $db[0];
    echo "<br/>";
}
$result->free();
$conn->close();