<?php 

// value
// $a = 1;
// $b = $a;
// $a = 2;


//echo $a === $b;
// echo $a;
// echo $b;

// Reference
// $a = 5;
// $b = &$a;
// $b = 0;

// echo $a;
// echo $b;

class Car {
  public $color =  'red';
}

$carOne = new Car();
$carTwo = &$carOne;
// $carTwo->color = 'green';

// echo $carOne->color;
echo $carTwo === $carOne;