<?php 

    session_start();
    require ('functions.php');

    if (isset($_GET['del'])) {
        $cart_id = $_GET['del'];
        $sql = $deletecart->deletecartza($cart_id);

        if ($sql) {
            $_SESSION['success'] = "ลบตระกร้าสำเร็จ";
            header("location: cart.php");
        }
    }

?>