<?php

    session_start();
    require ('../functions.php');

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($fullname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อนามสกุล';
            header("location: adminregister.php");
        }  else if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกUsername';
            header("location: adminregister.php");
        } else if (empty(strlen($_POST['password']))) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: adminregister.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: adminregister.php");
        } else {
            
            $sql = $adminNew->registrationAdmin($fullname, $username, $password);

            if ($sql) {
                echo "<script>alert('สมัครสมาชิกสำเร็จ');</script>";
                echo "<script>window.location.href='adminlogin.php'</script>";
            } else {
                echo "<script>alert('Something went wrong! Please try again.');</script>";
                echo "<script>window.location.href='adminregister.php'</script>";
            }
        }
    }
?>