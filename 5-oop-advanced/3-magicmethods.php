<?php
// 1 to String
// class Person 
// {

//   public $name = 'Jane';
//   private $phone = 12345;

//   public function __toString()
//   {
//     return "Name: $this->name . Phone: $this->phone";
//   }
// }

// $p = new Person();
// echo $p;


// 2 __get and __set 

// class Person 
// {
//   public $name = "Jane";
//   private $phone = 123;

  // public function __get($propName)
  // {
  //   if($propName === 'username') {
  //     return $this->name;
  //   }

  //   return "Property $propName does not exist";
  // }

  // public function __set($propName, $value)
  // {
    // var_dump($propName, $value);
//     throw new Exception(message: 'property does not exist');
//   }
// }

// $p = new Person();
// $p->username = 'Marry';

// 4 __call
// Redirect method

class Person
{
  public $name = "Jane";
  private $phone = 1234;

  public function __call($name, $args)
  {
    // var_dump($name, $args);
    // echo "No Method";
    if($name === 'getMobilePhone')
    {
      return $this->getPhone();
    } else if ($name === 'setMobilePhone') {
      call_user_func_array([$this, 'setPhone'], $args);
    }
  }

  public function getPhone()
  {
    return $this->phone;
  }

  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
}

$p = new Person();
echo serialize($p);

var_dump(unserialize(serialize($p)));
// $p->setMobilePhone(123123123);
// echo $p->getMobilePhone();
