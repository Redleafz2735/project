<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $id= $_GET['del'];
        $sql = $deletedata->material_caculate_type($id);

        if ($sql) {
            $_SESSION['success'] = "ลบสินค้าสำเร็จ";
            header("location: adminCalculation.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminCalculation.php");
        }
    }

?>