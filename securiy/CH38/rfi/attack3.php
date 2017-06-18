<?php
$output = <<<'STR'
<?php
echo __LINE__;
$conn = new mysqli("localhost", "moga", "bb","");
$result = $conn->query("show  databases");
foreach($result->fetch_all() as $db){
    echo $db[0];
    echo "<br/>";
}$result->free();
$conn->close();
STR;
echo $output;
