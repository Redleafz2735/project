<?php

    session_start();
    require ('functions.php');


    if(isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];

        $sql = $updateuser->update($fullname, $address, $user_id);
        if ($sql) {
            echo "<script>alert('อัพเดทสำเร็จ!');</script>";
            echo "<script>window.location.href='userprofile.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='userprofile.php'</script>";
        }
    }

?>