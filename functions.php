<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

// RegisterLogin Class
require ('database/RegisterLogin.php');




// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db );

// RegisterLogin object
$userdata = new RegisterLogin($db);
$usernamecheck = new RegisterLogin($db);
