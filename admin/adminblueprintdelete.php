<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $blue_id = $_GET['del'];
        $sql = $deletedata->deleteadminblueprint($blue_id);

        if ($sql) {
            $_SESSION['success'] = "ลบรายการสำเร็จ";
            header("location: adminblueprint.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminblueprint.php");
        }
    }

?>