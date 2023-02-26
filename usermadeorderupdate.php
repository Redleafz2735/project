<?php 

    session_start();
    require_once "functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        printf($order_id);
        $status = $_POST['status'];
        print_r($status);

        if (empty($status)) {
            $_SESSION['error'] = 'กรุณาเลือกสถานะ';
            header("location: usermadeorder.php.php");
        }else {

            $sql = $updatecatagory->updatemadeOrders($made_id, $status);
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