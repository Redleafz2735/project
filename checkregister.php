<?php

    session_start();
    require ('functions.php');

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($fullname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อนามสกุล';
            header("location: register.php");
        } else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: register.php");
        } else if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: register.php");
        } else if (empty(strlen($_POST['password']))) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: register.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: register.php");
        } else {
            
            $sql = $userdata->registration($fullname, $address, $username, $password);

            if ($sql) {
                echo "<script>alert('Registor Successful!');</script>";
                echo "<script>window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('Something went wrong! Please try again.');</script>";
                echo "<script>window.location.href='register.php'</script>";
            }
        }
    }
?>