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

        $sql = $admincatagory->Insertblueprint($blue_id, $name);
        if ($sql) {
            $_SESSION['success'] = "เพิ่มบลูปลิ้นสำเร็จ";
            header("location: adminblueprint.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: adminblueprint.php");
        }
    }

?>