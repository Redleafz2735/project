<?php

    session_start();
    require ('../functions.php');


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        print_r($made_id);
        echo "<br/>";
        $id = $_POST['id'];
        print_r($id);
        echo "<br/>";
        $MD_Qty = $_POST['MD_Qty'];
        print_r($MD_Qty);
        echo "<br/>";
        $MD_price = $_POST['MD_price'];
        print_r($MD_price);
        echo "<br/>";

        $sql = $adminuser->updatemadeOrdersdetail($id, $MD_Qty, $MD_price);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทวัสดุสำเร็จ";
            header("location: adminmadeOrderdetail.php?id=$made_id"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminmadeOrderdetail.php?id=$made_id");
        }
    }

?>