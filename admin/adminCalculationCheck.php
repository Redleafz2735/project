<?php 

session_start();
require_once "../functions.php";

if (isset($_POST['submit'])) {
    $Value = $_POST['Value'];

        $sql = $admincatagory->Insertmaterial_caculate_type($Value);
        if ($sql) {
            $_SESSION['success'] = "เพิ่มสูตรสำเร็จ";
            header("location: adminCalculation.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminCalculation.php");
        }
    }

?>