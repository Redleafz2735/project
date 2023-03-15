<?php 

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        printf($made_id);
        $made_price = $_POST['made_price'];

        $status = $_POST['status'];
        print_r($status);

        if (empty($status)) {
            $_SESSION['error'] = 'กรุณาเลือกสถานะ';
            header("location: adminmadeOrder.php");
        }else {

            $sql = $updatecatagory->updatemadeOrders1($made_id, $made_price, $status);
            if ($sql) {
                $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
                header("location: adminmadeOrder.php"); 
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                header("location: adminmadeOrder.php");
            }
        }
    }
?>