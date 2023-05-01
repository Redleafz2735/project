<?php

    session_start();
    require_once "../functions.php";


    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        // print_r($id);
        // echo "</br>";
        $adminorders_id = $_POST['adminorders_id'];
        // print_r($adminorders_id);
        // echo "</br>";
        $itemqty = $_POST['itemqty'];
        // print_r($itemqty);
        // echo "</br>";

        $sql = $adminuser->updateadminOrdersdetail($id, $itemqty);
        if ($sql) {
            echo "<script>window.location.href='adminincomedetails.php?id=$adminorders_id'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='adminincomedetails.php?id=$adminorders_id'</script>";
        }
        
    }

?>