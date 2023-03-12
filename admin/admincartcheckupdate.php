<?php

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $A_id = $_POST['A_id'];
        $A_qty = $_POST['A_qty'];
        $A_price = $_POST['A_price'];

        $price = $A_qty*$A_price;

        $sql = $adminOrder->updateadmincartleafz($A_id, $A_qty, $price);
        
        if ($sql) {
            echo "<script>alert('อัพเดทสำเร็จ!');</script>";
            echo "<script>window.location.href='admincompanyIN.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='admincompanyIN.php'</script>";
        }
        
    }

?>