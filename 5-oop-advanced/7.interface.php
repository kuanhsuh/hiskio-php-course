<?php

/*
* describe a set of functions and then hide the final implementation of those functions in an implementing class.

allow to change the implementation of those functino without changing how you use it

*/

interface Database {
  public function listOrders();
  public function addOrders();
  public function removeOrders();
}

class MySQLDatabase implements Database {
  public function listOrders() {
    // your function
  }

  public function addOrders(){
    // your function
  }
  public function removeOrders(){
    // your function
  }
}

class MongoDbDatabase implements Database {
  public function listOrders() {
    // your function
  }
  public function addOrders(){
    // your function
  }
  public function removeOrders(){
    // your function
  }
}

// $database = new MySQLDatabase()
$database = new MongoDbDatabase()
$database->listOrders();