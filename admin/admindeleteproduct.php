<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $item_id= $_GET['del'];
        $sql = $deletedata->deleteproduct($item_id);

        if ($sql) {
            $_SESSION['success'] = "ลบสินค้าสำเร็จ";
            header("location: adminproduct.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminproduct.php");
        }
    }

?>