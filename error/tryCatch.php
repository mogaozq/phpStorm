<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-05-22
 * Time: 10:07 PM
 */
ini_set("display_errors", "false");
try {
    repeatHello(3);
    repeatHello(-2);
    repeatHello("DK");
} catch (Exception $exception) {
    echo $exception->getMessage() . " " . $exception->getFile() . " " . $exception->getLine() . " ";
    //todo sth
} finally {
    //todo sth2
}

//try{
//    $file = fopen("lk.txt","r");
//    if(!$file) throw new Exception("file open error");
//}catch (Exception $e){
//    echo $e->getMessage()." ".$e->getFile()." ".$e->getLine()." ";
//}

function repeatHello($n)
{
    if (!is_numeric($n)) throw new InvalidArgumentException("argument is not integer");
    elseif ($n < 0) throw new InvalidArgumentException("argument is negative");
    else {
        for ($i = 0; $i < $n; $i++) {
            echo "hello";
            echo "<br/>";
        }
    }

}
