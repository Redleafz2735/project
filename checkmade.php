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
        // print_r($made_id);
        // echo '</br>';
        $user_id = $_POST['user_id'];
        // print_r($user_id);
        // echo '</br>';
        $blue_id = $_POST['blue_id'];
        // print_r($blue_id);
        // echo '</br>';
        $made_qty = $_POST['made_qty'];
        // print_r($made_qty);
        // echo '</br>';
        $color = $_POST['color'];
        // print_r($color);
        // echo '</br>';
        $width_cm = $_POST['width'];
        // print_r($width_cm);
        // echo '</br>';
        $height_cm = $_POST['height'];
        // print_r( $height_cm);
        // echo '</br>';
        $made_price = $_POST['made_price'];
        // print_r($made_price);
        // echo '</br>';
        $status = "NULL";
        // print_r($status);
        // echo '</br>';

        $width = $width_cm / 100;
        $height = $height_cm / 100;
        $area = $width * $height;
        // print_r($area);
        // echo '</br>';  

        $sql = $Insertorders->insertmadeOrder($made_id, $blue_id, $user_id, $color, $made_price, $width_cm, $height_cm, $status, $made_qty);
        
        $total = 0;
        $sql1 = $user->fetblueprintmaterailsend($blue_id);
            while($row1 = mysqli_fetch_array($sql1)) {
                $MQTY = $row1['M_Qty'];
                $type_id = $row1['type_id'];
                $price = $row1['item_price'];

                if($type_id == 1){
                    $calculated_price = $price /6 * $height*2*$made_qty;
                    $calculated_mqty = $MQTY*$height*2*$made_qty;
                } elseif ($type_id == 2) {
                    $calculated_price = $price /6 * $area*$made_qty;
                    $calculated_mqty = $MQTY*$height*$made_qty;
                } elseif ($type_id == 3) {
                    $calculated_price = $price /6 * $width*$made_qty;
                    $calculated_mqty = $MQTY*$width*$made_qty;
                } elseif ($type_id == 5) {
                    $calculated_price = $price /6 * ($width*2+$height*2)*2*$made_qty;
                    $calculated_mqty = $MQTY*($width*2+$height*2)*$made_qty;
                }
                $rounded_price = round($calculated_price, 2);
                $total = $total+$rounded_price;     
            
            // print_r($rounded_price);
            // echo '</br>';
            // print_r($calculated_mqty);
            // echo '</br>';  
        
            $sql2 = $Insertorders->insertmadeOrderdetails($made_id, $blue_id, $row1['item_id'], $rounded_price, $calculated_mqty);
        }
        if ($sql) {
            echo "<script>alert('สั่งทำเรียบร้อย');</script>";
            echo "<script>window.location.href='usermadeorder.php'</script>";
        }

    }

?>