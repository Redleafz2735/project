<?php 

session_start();
require_once "../functions.php";

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if (isset($_POST['submit'])) {

    $blue_id = guidv4();
    print_r($blue_id);
    echo '</br>';
    $name = $_POST['name'];
    print_r($name);
    echo '</br>';
    $picture = $_FILES['picture'];
    print_r($picture);
    echo '</br>';
    $b_status = $_POST['b_status'];
    print_r($b_status);
    echo '</br>';

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $picture['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../assets/'.$fileNew;
        $truePath = './assets/'.$fileNew;
    
        if (in_array($fileActExt, $allow)) {
            if ($picture['size'] > 0 && $picture['error'] == 0) {
                if (move_uploaded_file($picture['tmp_name'], $filePath)){
                    $picture = $truePath;
                    $sql = $productinsert->Insertblueprint($blue_id, $name, $picture, $b_status);
                if ($sql) {
                    $_SESSION['success'] = "เพิ่มบลูปลิ้นสำเร็จ";
                    header("location: adminblueprint.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: adminblueprint.php");
                }
                } 
            }
        }
        
    }

?>