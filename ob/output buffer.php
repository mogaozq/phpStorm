<?php
//ob_start(); this is layer buffer we can call it multiple times;

for($i=0;$i<100;$i++){
    if($i%20==0){
        ob_flush();// send data to higher buffer layer;
        flush();
    }
    echo "my name is moga.";
    echo "<br/>";
    usleep(100000);
}



