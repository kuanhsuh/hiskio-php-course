<!--

static Self refers to class, not instance
protected - extends to parent class will also inherit
private - only to this class
-->


<?php


class Car
{
    // public $color = 'red';
    static $color = 'blue';
    public $myCounter = 0;
    static $counter = 0;
    protected $weight = 1000;

    static protected $availableColors = [
        'red', 'green', 'blue'
    ];
    
    public function __construct()
    {
        $this->myCounter++;
        self::$counter++;
    }

    public static function getAvailableColors()
    {
        return self::$availableColors[0];
    }
    
    public function getWeight() {
        return $this->weight;
    }
}

class Toyota extends Car {


}
// 1. Static
// $myCar = new Car();
// echo $myCar->color;
// echo Car::$color;

// 2. private
// $myCar = new Toyota();
// echo $myCar->weight;
// echo $myCar->getWeight();

$myCar = new Car();
// echo $myCar->myCounter . '<br/>';
// echo Car::$counter;
echo $myCar->getAvailableColors();
