<?php

require_once './Cart.php';

$cart->saveCart();
$cart->clearCart();

header('Location: http://localhost:8888/Hiskio-PHP-Course/4-Shop-app/final-project/index.php');