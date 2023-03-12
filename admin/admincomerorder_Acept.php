<?php 

    session_start();
    require_once "../functions.php";

    if(isset($_POST['submit'])) {
        $adminorders_id = $_POST['adminorders_id'];
        $status = "success";

        $sql1 = $Order->adminOrderinnerjoinza($adminorders_id);
        while($row = mysqli_fetch_array($sql1)) {
            $QTY = $Order->fetchdataproduct($row['item_id']);
            while($rowbad = mysqli_fetch_array($QTY)){

                $oldqty = $rowbad['item_qty'];
                $cartqty = $row['Admin_Qty'];
                $new_qty = $oldqty + $cartqty;
                $sql2 = $Order->updateProductqty($row['item_id'], $new_qty);
            }

        }
        $sql = $adminOrder->updateadminOrders($adminorders_id, $status);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
            header("location: adminincome.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: adminincome.php");
        }
        
    }

?>