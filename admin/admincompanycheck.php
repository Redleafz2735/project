<?php

    session_start();
    require_once "../functions.php";

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
        $uuid = guidv4();
        print_r($uuid);
        echo "<br/>";
        $company_id = $_POST['company_id'];
        print_r($company_id);
        echo "<br/>";
        $admin_id = $_POST['admin_id'];
        print_r($admin_id);
        echo "<br/>";
        $total = $_POST['total'];
        print_r($total);
        echo "<br/>";
        $status = "NULL";
        print_r($status);
        echo "<br/>";

        $sql = $adminOrder->adminInsertOrders($uuid, $admin_id, $total, $status);

        $sql1 = $adminuser->admincartfetch($company_id);
        while($row = mysqli_fetch_array($sql1)) {

            $sql2 = $adminOrder->adminInsertOrdersdetails($uuid, $row['item_id'], $row['A_price'], $row['A_qty'], $row['company_id']);
        }
        $sql3 = $adminOrder->deletealladmincart();                         
        if ($sql) {
            $_SESSION['success'] = "เพิ่มรายการเรียบร้อย";
            header("location: adminincome.php"); 
        } else {
            header("location: adminincome.php");
        }
    }
?>