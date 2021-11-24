<?php

class Products {
  // Property
  public $products = [
    [
      "id" => 1, 
      "name" => "Interior 1",
      "image" => "https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
      "price" => 10
    ],
    [
      "id" => 2, 
      "name" => "Interior 2",
      "image" => "https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
      "price" => 20
    ],
    [
      "id" => 3, 
      "name" => "Interior 3",
      "image" => "https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
      "price" => 30
    ]
  ];

  public function addProduct($product)
  {
    array_push($this->products, $product);
  }

  public function findProduct($id)
  {
    $key = array_search($id, array_column($this->products, 'id'));
    return $this->products[$key];
  }
}

return new Products();