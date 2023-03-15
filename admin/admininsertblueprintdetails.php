<?php 

session_start();
require_once "../functions.php";

if (isset($_POST['submit'])) {

    $blue_id = $_POST['blue_id'];
    print_r($blue_id);
    echo '</br>';
    $item_id = $_POST['item_id'];
    print_r($item_id);
    echo '</br>';
    $M_Qty = $_POST['M_Qty'];
    print_r($M_Qty);
    echo '</br>';

        $sql = $admincatagory->Insertblueprintdetails($blue_id, $item_id, $M_Qty);
        if ($sql) {
            $_SESSION['success'] = "เพิ่มบลูปลิ้นสำเร็จ";
            header("location: adminblueprint_matrial.php?id=$blue_id");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminblueprint_matrial.php?id=$blue_id");
        }
    }

?>