<?php

class Car {
  public $color =  'red';
  public $weight;
  public $year;
  public $availableColors = [
    'red', 'green', 'blue', 'white'
  ];

  public function getColor() {
    //print_r($this);
    echo "The car color is " . $this->color;
  }

  public function setYear($year)
  {
    $this->year = $year;
  }
}

$myCar = new Car();
//$car2 = new Car();
//$myCar->getColor();


// Method 1
// $myCar->setYear(2020);
// echo $myCar->year;

// Method 2
$myCar->weight = "1800kg";
echo $myCar->weight;