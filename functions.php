<?php 

require('DBController.php');
require('productsdb.php');
require('cartdb.php');

$db = new DBController();



$product = new Product($db);
$product->getData();
 $product->getProduct();


$cart = new Cart($db);



// style="font-weight: 500; font-weight: 18px;"



?>

