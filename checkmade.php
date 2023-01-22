<?php

    session_start();
    require ('functions.php');

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $uuid = guidv4();
        $made_type = $_POST['made_type'];
        $made_price = "0";
        $status = "NULL";
        $equidment = $_POST['equidment'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $details = $_POST['details'];

        $sql = $Insertorders->insertmadeOrder($uuid, $made_price, $user_id, $made_type, $status);
        $sql2 = $Insertorders->insertmadeOrderdetails($uuid, $size, $equidment, $color, $details);
        if ($sql) {
            echo "<script>alert('สั่งทำเรียบร้อย');</script>";
            echo "<script>window.location.href='usermadeorder.php'</script>";
        }
    }

?>