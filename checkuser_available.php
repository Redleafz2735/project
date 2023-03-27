<?php 

    include_once('functions.php');

    // Getting post value
    $username = $_POST['username'];

    $sql = $usernamecheck->usernameavailable($username);

    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        echo "<span style='color: red;'>ชื่อนี้ได้ถูกใช้งานไปแล้ว.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color: green;'>สามารถใช้ชื่อนี้ได้</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>