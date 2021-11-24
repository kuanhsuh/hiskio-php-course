<?php 

require_once './Cart.php';

$cart->removeItem($_GET['id']);

header('Location: http://localhost:8888/Hiskio-PHP-Course/4-Shop-app/final-project/index.php');