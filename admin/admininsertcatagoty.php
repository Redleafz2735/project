<?php 

session_start();
require_once "../functions.php";

if (isset($_POST['submit'])) {
    $productbrand = $_POST['productbrand'];

        $sql = $admincatagory->Insertproducttype($productbrand);
        if ($sql) {
            $_SESSION['success'] = "เพิ่มประเภทสินค้าสำเร็จ";
            header("location: admincatagory.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: admincatagory.php");
        }
    }

?>