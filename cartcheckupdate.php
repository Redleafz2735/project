<?php

    session_start();
    require ('functions.php');


    if(isset($_POST['submit'])) {
        $cart_id = $_POST['cart_id'];
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $itemqty = $_POST['itemqty'];

        $sql = $Cartjoin->updatecartleafz($cart_id, $user_id, $item_id, $itemqty);
        if ($sql) {
            echo "<script>alert('อัพเดทสำเร็จ!');</script>";
            echo "<script>window.location.href='cart.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='cart.php'</script>";
        }
        
    }

?>