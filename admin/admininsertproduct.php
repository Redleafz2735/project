<?php 

session_start();
require_once "../functions.php";

if (isset($_POST['submit'])) {
    $item_brand = $_POST['item_brand'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = $_FILES['item_image'];
    $item_register = new DateTime();
    $timezone = new DateTimeZone('Asia/Bangkok');
    $i1 = $item_register->setTimezone($timezone);
        
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $item_image['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../assets/products/'.$fileNew;
        $truePath = './assets/products/'.$fileNew;
        
        if (in_array($fileActExt, $allow)) {
            if ($item_image['size'] > 0 && $item_image['error'] == 0) {
                if (move_uploaded_file($item_image['tmp_name'], $filePath)){
                    $item_image = $truePath;
                    $sql = $productinsert->Insertproduct($item_brand, $item_name, $item_price, $item_image, $i1->format('Y-m-d h:i:sa'));
                    if ($sql) {
                        $_SESSION['success'] = "เพิ่มสินค้าสำเร็จ successfully";
                        header("location: adminproduct.php");
                    } else {
                        $_SESSION['error'] = "Data has not been inserted successfully";
                        header("location: adminproduct.php");
                    }
                } 
            }
        }
}


?>