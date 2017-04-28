<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-04-27
 * Time: 10:53 PM
 */
if (isset($_POST['user']) && isset($_POST['pass'])){
    if($_POST['user'] =="mo ga" && $_POST['pass']=="08525"){
        echo "some information for {$_POST['user']}";
    }else{
        echo "invalid data";
    }
}