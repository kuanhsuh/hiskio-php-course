<?php

class Cart {

  function __construct()
  {
    if(!isset($_SESSION)) {
      session_start();
    }
  }

  public function addToCart($product)
  {
    $_SESSION['cartItems'][$product['id']]['item'] = $product;
    $_SESSION['cartItems'][$product['id']]['qty']++;
    $_SESSION['cartItems'][$product['id']]['cartItemPrice'] +=  $product['price'];
    
    $_SESSION['totalQty']++;
    $_SESSION['totalPrice'] += $product['price'];
  }

  public function clearCart()
  {
    unset($_SESSION['cartItems']);
    $_SESSION['totalQty'] = 0;
    $_SESSION['totalPrice'] = 0;
  }

  public function removeItem($id)
  {
    $product_price = $_SESSION['cartItems'][$id]['item']['price'];
    $_SESSION['cartItems'][$id]['qty']--;
    $_SESSION['cartItems'][$id]['cartItemPrice'] -= $_SESSION['cartItems'][$id]['item']['price'];

    if($_SESSION['cartItems'][$id]['qty'] <= 0) {
      unset($_SESSION['cartItems'][$id]);
    }

    $_SESSION['totalQty']--;
    if($_SESSION['totalQty'] <= 0) {
      $_SESSION['totalQty'] = 0;
    }
    
    $_SESSION['totalPrice'] -= $product_price;
    if($_SESSION['totalPrice'] <= 0) {
      $_SESSION['totalPrice'] = 0;
    }
  }

  public function saveCart()
  {
    $servername = "localhost";
    $dbname = "2021-hiskio-php-noteapp";
    $username = "root";
    $password = "root";

    try {
      $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "connect successfully";
      $mysqlRequest = "INSERT INTO orders (cart) VALUES (:cart)";
      $statement = $connection->prepare($mysqlRequest);
      $statement->bindValue('cart', json_encode($_SESSION['cartItems']));
      return $statement->execute();
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}

$cart = new Cart();
return $cart;