<?php

    session_start();
    require ('../functions.php');


    if(isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];

        $sql = $updateuser->update($fullname, $address, $user_id);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทผู้ใช้สำเร็จ";
            header("location: adminuser.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminuser.php");
        } 
    }

?>