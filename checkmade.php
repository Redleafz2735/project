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
        $made_id = guidv4();
        $user_id = $_POST['user_id'];
        $blue_id = $_POST['blue_id'];
        $made_qty = $_POST['made_qty'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $details = $_POST['details'];
        $made_price = $_POST['made_price'];
        $status = "NULL";

        $sql = $Insertorders->insertmadeOrder($made_id, $blue_id, $user_id, $color, $made_price, $size, $details, $status, $made_qty);

        $sql1 = $user->fetblueprintmaterailsend($blue_id);
            while($row1 = mysqli_fetch_array($sql1)) {
            $MQTY = $row1['M_Qty']*$made_qty;
            $MPRICE = $row1['M_Price']*$made_qty;

            $sql2 = $Insertorders->insertmadeOrderdetails($made_id, $blue_id, $row1['item_id'], $MPRICE, $MQTY);
        }
        if ($sql) {
            echo "<script>alert('สั่งทำเรียบร้อย');</script>";
            echo "<script>window.location.href='usermadeorder.php'</script>";
        }

    }

?>