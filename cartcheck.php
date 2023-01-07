<?php

    session_start();
    require ('functions.php');

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    if (isset($_POST['submit'])) {
        $uuid = guidv4();
        $user_id = $_POST['user_id'];
        print_r($user_id);
        $subtotal = $_POST['subtotal'];
        print_r($subtotal);
        $status = "NULL";
        print_r($status);
        $item_id = $_POST['item_id'];
        print_r($item_id);
        $item_price = $_POST['item_price'];
        print_r($item_price);
        $quantity = $_POST['quantity'];
        print_r($quantity);



    }
?>