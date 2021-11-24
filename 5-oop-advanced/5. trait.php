<!-- Single Inheritance, 
Inherit Multiple behaviors
-->
<?php 
//  trait can not have constants and properties

// trait MyTrait {
//   public function fly()
//   {
//     echo 'I am flying';
//   }

//   public function hello()
//   {
//     echo 'Hello World';
//   }

//   abstract function drive();

// }

// class Plane {

//   use MyTrait;
  
//   public function drive()
//   {
//     echo "plane driving";
//   }
// }

// class Helicopter {

//   use MyTrait;

//   public function drive()
//   {
//     echo "helicopter driving";
//   }
  
// }

// $plane = new Plane();
// $helicopter = new Helicopter();

// $plane->fly();
// $helicopter->fly();
// $plane->drive();
// $helicopter->drive();

trait FlyableTrait {

  public function hello()
  {
    echo 'I can fly';
  }
}

trait EngineTrait {
  public function hello()
  {
    echo 'I am an engine';
  }
}

class Plane {
  use FlyableTrait, EngineTrait {
    FlyableTrait::hello insteadof EngineTrait;
    EngineTrait::hello as engineHello;
  }
}

$plane = new Plane();
$plane->engineHello();