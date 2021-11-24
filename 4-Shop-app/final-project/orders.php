<?php
$servername = "localhost";
$dbname = "2021-hiskio-php-noteapp";
$username = "root";
$password = "root";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $mysqlRequest = "SELECT * FROM orders";
  $statement = $connection->prepare($mysqlRequest);
  $statement->execute();
  $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

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
  <div class="container py-5">
    <table class="table table-bordered">
      <thead>
        <th style="width: 10%;">#ID</th>
        <th>Order</th>
      </thead>
      <tbody>
        <?php foreach($orders ?? [] as $order): ?>
        <tr>
          <td><?php echo $order['id']; ?></td>
          <td><?php echo $order['cart']; ?></td>
        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>