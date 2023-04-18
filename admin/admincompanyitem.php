<?php

    session_start();
    require_once "../functions.php";

    if (isset($_POST['submit'])) {
        $admin_id = $_POST['admin_id'];
        print_r($admin_id);
        echo "<br/>";
        $company_id = $_POST['company_id'];
        print_r($company_id);
        echo "<br/>";
        $item_id = $_POST['item_id'];
        print_r($item_id);
        echo "<br/>";
        $item_qty = $_POST['item_qty'];
        print_r($item_qty);
        echo "<br/>";
        $colors = $_POST['colors'];
        print_r($colors);
        echo "<br/>";
        $size = $_POST['size'];
        print_r($size);
        echo "<br/>";
        
        $sql3 = $adminuser->fetpriceadmin($item_id, $colors, $size);
        while($row3 = mysqli_fetch_array($sql3)) {
        $price = $row3['price'];
        print_r($price);
        echo "<br/>";
        }

        $trueprice = $item_qty*$price;
        print_r($trueprice);
        echo "<br/>";

        $sql = $adminOrder->admincart($admin_id, $company_id, $item_id, $item_qty, $trueprice, $colors, $size);
        if ($sql) {
            $_SESSION['success'] = "เพิ่มรายการเรียบร้อย";
            header("location: admincompanydetail.php?id=$company_id"); 
        } else {
            header("location: admincompanydetail.php?id=$company_id");
        }
    }
?>