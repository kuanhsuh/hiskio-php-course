<?php


// echo '<pre>',print_r($_POST),'</pre>';

$connection = require_once './Connection.php';

$connection->removeNote($_POST['id']);

header('Location: index.php');