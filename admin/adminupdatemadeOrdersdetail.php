<?php 

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        printf($made_id);
        $status = $_POST['status'];
        print_r($status);

        if (empty($status)) {
            $_SESSION['error'] = 'กรุณาเลือกสถานะ';
            header("location: adminmadeOrder.php");
        }else {

            $sql = $updatecatagory->updatemadeOrders($made_id, $status);
            $sql2 = $updatecatagory->deletemadeorderRequest($made_id);
            if ($sql2) {
                $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
                header("location: adminmadeOrder.php"); 
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                header("location: adminmadeOrder.php");
            }
        }
    }
?>