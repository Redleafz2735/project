<?php

    session_start();
    require ('functions.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
            $cart = $product->getProduct($item['item_id']);
        }
    }


?>