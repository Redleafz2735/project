<?php 

    session_start();
    require_once "../functions.php";

    if (isset($_GET['del'])) {
        $user_id= $_GET['del'];
        $sql = $admindeleteuser->deleteUser($user_id);

        if ($sql) {
            $_SESSION['success'] = "ลบUserสำเร็จ";
            header("location: adminuser.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminuser.php");
        }
    }

?>