<?php 

session_start();
require_once "../functions.php";

if (isset($_POST['update'])) {
    $blue_id = $_POST['blue_id'];
    print_r($blue_id);
    echo "</br>";
    $b_status = $_POST['b_status'];
    print_r($b_status);
    echo "</br>";
    $name = $_POST['name'];
    print_r($name);
    echo "</br>";
    $picture = $_FILES['picture'];
    print_r($picture);
    echo "</br>";
    
    $img2 = $_POST['img2'];
    print_r($img2);
    echo "</br>";
    $upload = $_FILES['picture']['name'];

    $check = 1;

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $picture['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../assets/'.$fileNew;
        $truePath = './assets/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($picture['size'] > 0 && $picture['error'] == 0) {
                move_uploaded_file($picture['tmp_name'], $filePath);
                $picture = $truePath;

                $sql = $updateproduct->updateblueprint($b_status, $name, $picture, $blue_id); 
                if ($sql) {
                    $_SESSION['success'] = "อัพเดทสินค้าสำเร็จ";
                    header("location: adminblueprint.php"); 
                } else {
                    $_SESSION['error'] = "Data has not been inserted successfully";
                    header("location: adminblueprint.php");
                }              
            }
        }
    } else {
        $sql = $updateproduct->updateblueprint($b_status, $name, $check, $blue_id);
        print_r($sql);
        if ($sql) {
            $_SESSION['success'] = "อัพเดทสินค้าสำเร็จ";
            header("location: adminblueprint.php"); 
        } 
    } 

}
?>

