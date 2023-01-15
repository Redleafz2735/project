<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

// RegisterLogin Class
require ('database/RegisterLogin.php');

// Test class
require ('database/Test.php');

// User class
require ('database/User.php');

// Insertproduct class
require ('database/ProductInsert.php');

// Admin class
require ('database/Admin.php');

// Order class
require ('database/Orders.php');


// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db);

// RegisterLogin object
$userdata = new RegisterLogin($db);
$usernamecheck = new RegisterLogin($db);

// Test
$fetchdata = new Testproduct($db);
$innerjoin = new Testproduct($db);

//Userprofile
$updateuser = new User($db);
$userorder = new User($db);
$Cartjoin = new User($db);
$Insertorders = new User($db);
$deletecart = new User($db);

//adminzone
$productinsert = new ProductInsert($db);
$updateproduct= new Testproduct($db);
$deletedata = new Testproduct($db);

//แบ่งส่วน
$adminuser = new Admin($db);
$adminupdateuser = new Admin($db);
$admindeletedatauser = new Admin($db);

//catagoly
$admincatagory = new Admin($db);
$admindeletecatagory = new Admin($db);

$admindeleteuser = new Admin($db);
$updatecatagory = new Admin($db);

//New admin
$adminNew = new Admin($db);

//Oders zone
$Order = new Testorders($db);






