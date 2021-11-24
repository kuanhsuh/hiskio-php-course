<?php

class Car
{

  public $color;
  public $manufacturer;

  const MY_CONSTANT = 123;

  const MANUFACTURER_BENZ = 'benz';
  const MANUFACTURER_TESLA = 'tesla';
  const MANUFACTURER_BMW = 'bmw';

  const COLOR_RED = 'red';
  const COLOR_GREEN = 'green';
  const COLOR_BLUE = 'blue';

  public function __construct($color, $manufacturer)
  {
    $this->color = $color;
    $this->manufacturer = $manufacturer;
  }

  public function getConstant()
  {
    return self::MY_CONSTANT;
  }
}

$myCar = new Car(color: CAR::COLOR_RED, manufacturer: CAR::MANUFACTURER_TESLA);

var_dump($myCar);