<?php 

    include_once('functions.php');

    // Getting post value
    $username = $_POST['username'];

    $sql = $usernamecheck->usernameavailable($username);

    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        echo "<span style='color: red;'>Username already associated with another account.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color: green;'>Username available for registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>