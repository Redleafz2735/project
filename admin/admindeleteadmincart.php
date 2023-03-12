<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $A_id= $_GET['del'];
        $sql = $deletedata->deleteadmincart($A_id);

        if ($sql) {
            $_SESSION['success'] = "ลบรายการสำเร็จ";
            header("location: admincompanyIN.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: admincompanyIN.php");
        }
    }

?>