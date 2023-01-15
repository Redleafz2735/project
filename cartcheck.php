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
        $sql1 = $Cartjoin->cartjoin($user_id);
        $uuid = guidv4();
        $subtotal = $_POST['subtotal'];
        $status = "NULL";
        $sql = $Insertorders->insertOrder($uuid, $user_id, $subtotal, $status);
        while($row = mysqli_fetch_array($sql1)) {
            $QTY = $Order->fetchdataproduct($row['item_id']);
            while($rowbad = mysqli_fetch_array($QTY)){
            
        $sql2 = $Insertorders->insertOrderdetails($uuid, $row['item_id'], $row['item_price'], $row['itemqty']);
        $oldqty = $rowbad['item_qty'];
        $cartqty = $row['itemqty'];
        $new_qty = $oldqty - $cartqty;
        $sql3 = $Order->updateProductqty($row['item_id'], $new_qty);
            }        
        } 
        $sql4 = $Order->deleteallcart();
        if ($sql) {
            echo "<script>alert('สั่งซื้อเรียบร้อย');</script>";
            echo "<script>window.location.href='userorder.php'</script>";
        }
    

}
?>