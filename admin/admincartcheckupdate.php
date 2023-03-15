<?php

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $company_id = $_POST['company_id'];
        $A_id = $_POST['A_id'];
        $A_qty = $_POST['A_qty'];
        $A_price = $_POST['A_price'];

        $price = $A_qty*$A_price;

        $sql = $adminOrder->updateadmincartleafz($A_id, $A_qty, $price);
        
        if ($sql) {
            $_SESSION['success'] = "อัพเดทจำนวนสำเร็จ";
            header("location: admincompanyIN.php?id=$company_id");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: admincompanyIN.php?id=$company_id");
        }
        
    }

?>