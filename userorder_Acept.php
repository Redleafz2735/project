<?php 

    session_start();
    require_once "functions.php";


    if(isset($_POST['submit'])) {
        $made_id = $_POST['made_id'];
        $status = "in process";

        $sql1 = $userorder->madeOrderUserdetails($made_id);
        while($row = mysqli_fetch_array($sql1)) {
            $QTY = $Order->fetchdataproduct($row['item_id']);
            while($rowbad = mysqli_fetch_array($QTY)){

                $oldqty = $rowbad['item_qty'];
                $cartqty = $row['MD_Qty'];
                $new_qty = $oldqty - $cartqty;
                $sql2 = $Order->updateProductqty($row['item_id'], $new_qty);
            }

        }
        $sql = $updatecatagory->updatemadeOrders($made_id, $status);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทสถานะสำเร็จ";
            header("location: usermadeorder.php"); 
        } else {
            $_SESSION['error'] = "Data has not been inserted successfully";
            header("location: usermadeorder.php");
        }
        
    }
?>