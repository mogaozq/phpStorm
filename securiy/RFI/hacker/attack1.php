<?php // this code will execute in target.
$output = <<<'STR'
<?php
$conn = new mysqli("localhost", "moga", "bb","");
$result = $conn->query("show  databases");
foreach($result->fetch_all() as $db){
    echo $db[0];
    echo "<br/>";
}$result->free();
$conn->close();
STR;
echo $output;
