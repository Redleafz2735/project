<?php

    session_start();
    require ('functions.php');

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกUsername';
            header("location: login.php");
        } else if (empty(strlen($_POST['password']))) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: login.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: login.php");

        } else {   

            $result = $userdata->signin($username, $password);
            $num = mysqli_fetch_array($result);
            
            if ($num > 0) {
                $_SESSION['user_id'] = $num['user_id'];
                $_SESSION['fullname'] = $num['fullname'];
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('รหัสผ่าน หรือ Username ผิดโปรดลองใหม่อีกครั้ง');</script>";
                echo "<script>window.location.href='login.php'</script>";
            }
        }
    }
?>