<?php

    session_start();
    require ('../functions.php');


    if(isset($_POST['submit'])) {
        $producttype_id = $_POST['producttype_id'];
        $productbrand = $_POST['productbrand'];

        $sql = $updatecatagory->updatecatagory($producttype_id, $productbrand);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทประเภทสินค้าสำเร็จ";
            header("location: admincatagory.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: admincatagory.php");
        } 
    }

?>