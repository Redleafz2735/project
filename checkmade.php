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
        print_r($made_id);
        echo '</br>';
        $user_id = $_POST['user_id'];
        print_r($user_id);
        echo '</br>';
        $blue_id = $_POST['blue_id'];
        print_r($blue_id);
        echo '</br>';
        $made_qty = $_POST['made_qty'];
        print_r($made_qty);
        echo '</br>';
        $color = $_POST['color'];
        print_r($color);
        echo '</br>';
        $width = $_POST['width'];
        print_r($width);
        echo '</br>';
        $height = $_POST['height'];
        print_r( $height);
        echo '</br>';
        $made_price = $_POST['made_price'];
        print_r($made_price);
        echo '</br>';
        $status = "NULL";
        print_r($status);
        echo '</br>';

        $width_cm = $width / 100;
        $height_cm = $height / 100;
        $area = $width_cm * $height_cm;
        print_r($area);
        echo '</br>';  

        $sql = $Insertorders->insertmadeOrder($made_id, $blue_id, $user_id, $color, $made_price, $width, $height, $status, $made_qty);
        
        $total = 0;
        $sql1 = $user->fetblueprintmaterailsend($blue_id);
            while($row1 = mysqli_fetch_array($sql1)) {
            $MQTY = $row1['M_Qty']*$made_qty;

            if($area <= '1'){
                $price = $row1['item_price']-$row1['item_price']*70/100;
                $total = $total+$price*$MQTY;             
            } else if($area <= '5'){
                $price = $row1['item_price']-$row1['item_price']*65/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '10'){
                $price = $row1['item_price']-$row1['item_price']*60/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '15'){
                $price = $row1['item_price']-$row1['item_price']*55/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '20'){
                $price = $row1['item_price']-$row1['item_price']*50/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '25'){
                $price = $row1['item_price']-$row1['item_price']*45/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '30'){
                $price = $row1['item_price']-$row1['item_price']*40/100;
                $total = $total+$price*$MQTY;  
            }else if($area <= '36'){
                $price = $row1['item_price']-$row1['item_price']*35/100;
                $total = $total+$price*$MQTY;  
            }else if ($area > '36'){
                $price = $row1['item_price']-$row1['item_price']*20/100;
                $total = $total+$price*$MQTY;  
            }

            print_r($price);
            echo '</br>';  

            $sql2 = $Insertorders->insertmadeOrderdetails($made_id, $blue_id, $row1['item_id'], $price, $MQTY);
        }
        if ($sql) {
            echo "<script>alert('สั่งทำเรียบร้อย');</script>";
            echo "<script>window.location.href='usermadeorder.php'</script>";
        }

    }

?>