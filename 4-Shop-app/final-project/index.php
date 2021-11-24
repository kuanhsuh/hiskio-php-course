<?php

$products = require_once './Products.php';
require_once './Cart.php';

$ROOT_URL = str_replace("index.php", "", $_SERVER["REQUEST_URI"]);

$products->addProduct([
  "id" => 4, 
  "name" => "Interior 4",
  "image" => "https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
  "price" => 40
]);

if(isset($_GET['id'])) {
  $product = $products->findProduct($_GET['id']);
  $cart->addToCart($product);
  header('Location: index.php');
}
// echo '<pre>',print_r($_SESSION),'</pre>';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container justify-content-start">
      <a class="navbar-brand" href="index.php">商店</a>
      <a class="navbar-brand" href="orders.php">訂單</a>
    </div>
  </nav>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <?php foreach($products->products as $product): ?>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <img
                  src="<?php echo $product['image']; ?>"
                  alt="" class="d-block w-100">
                <div class="p-2">
                  <div class="d-flex justify-content-between ">
                    <?php echo $product['name']; ?>
                    <div><?php echo $product['price']; ?>$</div>
                  </div>
                  <a href="?id=<?php echo $product['id']; ?>" class="btn btn-primary d-block w-100 mt-4">Buy Now</a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-md-3">
          <h2>Cart<span class="ms-2 badge bg-secondary">
            <?php if(isset($_SESSION['totalQty'])): ?>
              <?php echo $_SESSION['totalQty']; ?>
            <?php else: ?>
              0
            <?php endif; ?>
          </span></h2>

          <ul class="list-group">
            <?php if(isset($_SESSION['cartItems'])): ?>
              <?php foreach($_SESSION['cartItems'] as $cartItem): ?>
              <li class="list-group-item">
                <?php echo "{$cartItem['item']['name']} x {$cartItem['qty']} - {$cartItem['cartItemPrice']}$"; ?>

                <a href="<?php echo "{$ROOT_URL}remove.php?id={$cartItem['item']['id']}"; ?>" class="btn btn-outline-danger btn-sm">移除</a>
              </li>
              <?php endforeach; ?>
            <?php else: ?>
              <li class="list-group-item">No Item In Cart</li>
            <?php endif; ?>
          </ul>

          <h4 class="text-right mt-4">Total: <?php echo $_SESSION['totalPrice'] ?? 0; ?>$</h4>

          <a href="<?php echo "{$ROOT_URL}/clearcart.php"?>" class="btn btn-outline-secondary d-block mt-4 w-100">清除購物車</a>

          <a href="<?php echo "{$ROOT_URL}/savecart.php"?>" class="btn btn-primary d-block mt-4 w-100">送出</a>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>