<?php

    session_start();
    require ('../functions.php');

    if (isset($_POST['adminlogin'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกUsername';
            header("location: adminlogin.php");
        } else if (empty(strlen($_POST['password']))) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: adminlogin.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: adminlogin.php");
        } else {   

            $result = $adminNew->signinadmin($username, $password);
            $num = mysqli_fetch_array($result);
            
            if ($num > 0) {
                $_SESSION['admin_id'] = $num['admin_id'];
                $_SESSION['fullname'] = $num['fullname'];
                echo "<script>window.location.href='adminindex.php'</script>";
            } else {
                echo "<script>alert('รหัสผ่าน หรือ Username ผิดโปรดลองใหม่อีกครั้ง');</script>";
                echo "<script>window.location.href='adminlogin.php'</script>";
            }
        }
    }
?>