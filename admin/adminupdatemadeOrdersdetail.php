<?php 

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        $made_price = $_POST['made_price'];
        $status = $_POST['status'];

        $sql = $updatecatagory->updatemadeOrderdetails($made_id, $status, $made_price);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทสำเร็จ";
            header("location: adminmadeOrder.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminmadeOrder.php");
        } 
    }
?>