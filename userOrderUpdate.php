<?php 

    session_start();
    require_once "functions.php";


    if(isset($_POST['submit'])) {
        $order_id = $_POST['order_id'];
        printf($order_id);
        $status = $_POST['status'];
        print_r($status);

        if (empty($status)) {
            $_SESSION['error'] = 'กรุณาเลือกสถานะ';
            header("location: userOrder.php");
        }else {

            $sql = $updatecatagory->updateOrderdetails($order_id, $status);
            if ($sql) {
                $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
                header("location: userorder.php"); 
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                header("location: userorder.php");
            }
        }
    }
?>