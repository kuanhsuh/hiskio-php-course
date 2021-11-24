<?php
/**
 * extended class can access parent protected method with $this
 */
class ParentClass
{
  public $property1 = '1';
  protected $property2 = '2';
  private $property3 = '3';
  public const MY_CONSTANT = 'MYCONSTANT';

  public function getProperty2()
  {
    return $this->property2;
  }

  public function getProperty3()
  {
    return $this->property3;
  }

  protected function printText(string $text)
  {
    echo $text;
  }

}

class ChildClass extends ParentClass
{
  public function getProperty2s()
  {
    return parent::getProperty2();
  }

  public function printWord($word) {
    return $this->printText($word);
  }
}

$obj = new ChildClass();
// echo $obj->property1;
// echo $obj->getProperty2s() . '<br/>';

$obj->printWord('Hello');