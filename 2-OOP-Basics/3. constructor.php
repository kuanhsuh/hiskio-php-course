<?php

class Car {
  public $color;
  public $weight;
  public $year;
  public $availableColors = [
    'red', 'green', 'blue', 'white'
  ];

  public function __construct($color, $weight) {
    $this->color = $color;
    $this->weight = $weight;
  }

  public function getColor() {
    //print_r($this);
    echo "The car color is " . $this->color.PHP_EOL;
  }

  public function setYear($year)
  {
    $this->year = $year;
  }

  public function setColor($color)
  {
    if(in_array($color, $this->availableColors)) {
      $this->color = $color;
    }
  }
}

$myCar = new Car("red", "1800kg");
$myCar->getColor();
echo $myCar->weight.PHP_EOL;

$myCar->setColor("black");
$myCar->getColor();