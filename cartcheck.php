<?php

    session_start();
    require ('functions.php');

    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $subtotal = $_POST['subtotal'];

        $sql = $Cartjoin->insertOrder($user_id, $subtotal);
        
        if ($sql) {
            echo "<script>alert('ยืนยันการซื้อสำเร็จ');</script>";
            echo "<script>window.location.href='cart1.php'</script>";
        }
    }
?>