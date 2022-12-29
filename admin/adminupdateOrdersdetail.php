<?php 

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $sql = $updatecatagory->updateOrderdetails($id, $status);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
            header("location: adminOrder.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminOrder.php");
        } 
    }
?>