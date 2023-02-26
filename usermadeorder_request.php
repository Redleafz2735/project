<?php 

    session_start();
    require_once "functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        $status = $_POST['status'];
        $details = $_POST['details'];

        if (empty($details)) {
            $_SESSION['error'] = 'กรุณาบอกสาเหตุที่ขอยกเลิก';
            header("location: usermadeorder.php");
        }else {

            $sql = $userorder->insertrequestmadeorder($made_id, $status, $details);
            if ($sql) {
                $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
                header("location: usermadeorder.php"); 
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                header("location: usermadeorder.php");
            }
        }
    }
?>