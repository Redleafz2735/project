<?php

    session_start();
    require ('../functions.php');


    if(isset($_POST['submit'])) {
        $blue_id = $_POST['blue_id'];
        print_r($blue_id);
        echo "<br/>";
        $id = $_POST['id'];
        print_r($id);
        echo "<br/>";
        $MD_Qty = $_POST['MD_Qty'];
        print_r($MD_Qty);
        echo "<br/>";
        $type_id = $_POST['type_id'];
        print_r($type_id);
        echo "<br/>";

        $sql = $adminuser->updateadminblueprint_matrial($id, $MD_Qty, $type_id);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทวัสดุสำเร็จ";
            header("location: adminblueprint_matrial.php?id=$blue_id"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminblueprint_matrial.php?id=$blue_id");
        }
    }

?>