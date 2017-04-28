<?php
require_once "Flyable.php";
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 3/18/2017
 * Time: 4:56 PM
 */

class Car
{
    use Flyable;
    const COMPANY = "BMW";
    public  $name;
    private $speed;
    public $price;

    /**
     * Car constructor.
     * @param $name
     * @param $balance
     */
    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }


    function showName()
    {
        echo $this->name;
    }

    public function showCompany()
    {
        echo $this::COMPANY;
    }

    static function company()
    {
        echo self::COMPANY;
    }

    public function speedUp()
    {
        $this->speed += 10;
    }


    public function getSpeed()
    {
        return $this->speed;
    }


    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    function __get($name)
    {
        switch ($name) {
            case "speed":
                return $this->getSpeed();
                break;
            case "moga":
                return "mohammad";
                    break;
        }
    }

    function __set($name, $value)
    {
        switch ($name) {
            case "speed":
                $this->speed = $value;
                break;
        }
    }


    function shoot()
    {
        echo "shoot";
    }
}
