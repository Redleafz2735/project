<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $producttype_id= $_GET['del'];
        $sql = $admindeletecatagory->deleteproducttype($producttype_id);

        if ($sql) {
            $_SESSION['success'] = "ลบประเภทสินค้าสำเร็จ";
            header("location: admincatagory.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: admincatagory.php");
        }
    }

?>