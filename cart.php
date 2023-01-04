<?php 

    ob_start();
    session_start();
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

    /*  include cart items if it is not empty */
        count($product->getData('cart')) ? include ('cartform.php') :  include ('Template/notFound/_cart_notFound.php');
    /*  include cart items if it is not empty */



    /*  include top sale section */
        include ('Template/_new-phones.php');
    /*  include top sale section */

?>

<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>



