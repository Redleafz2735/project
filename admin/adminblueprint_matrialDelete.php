<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_POST['submit'])) {
        $blue_id = $_POST['blue_id'];
        $id = $_POST['id'];
        $sql = $deletedata->deleteadminblueprint_material($id);

        if ($sql) {
            $_SESSION['success'] = "ลบรายการสำเร็จ";
            header("location: adminblueprint_matrial.php?id=$blue_id");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminblueprint_matrial.php?id=$blue_id");
        }
    }

?>