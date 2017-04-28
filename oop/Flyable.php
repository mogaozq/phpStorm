<?php

/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-03-20
 * Time: 5:01 PM
 */
trait Flyable
{
    public $maxAltitude =12;
    function fly(){
        echo $this->maxAltitude;
//        echo "flying in {$this::$maxAltitude}m from earth.";
    }

}