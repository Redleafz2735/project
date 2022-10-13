<?php 

    session_start();
    ob_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {
?>

<?php
// include header.php file
include ('header.php');
?>

<?php

    /*  include products */
    include ('Template/_products.php');
    /*  include products */

    /*  include top sale section */
    include ('Template/_top-sale.php');
    /*  include top sale section */

?>

<?php
// include footer.php file
include ('footer.php');

?>

<?php 
}
?>

