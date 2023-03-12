<?php 

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $adminorders_id = $_POST['adminorders_id'];
        printf($made_id);
        $status = $_POST['status'];
        print_r($status);

        if (empty($status)) {
            $_SESSION['error'] = 'กรุณาเลือกสถานะ';
            header("location: adminincome.php");
        }else {

            $sql = $updatecatagory->updateadminOrders($adminorders_id, $status);
            if ($sql) {
                $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
                header("location: adminincome.php"); 
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                header("location: adminincome.php");
            }
        }
    }
?>