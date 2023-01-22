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

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                <div class="card-body">
                    <div class="font-rubik ">
                        <h5 class="text-center"><strong>แก้ไขจำนวน</strong></h5>
                        <hr>
                        <?php
                            $cart_id = $_GET['id'];
                            $sql = $Cartjoin->fetchdatacart($cart_id);
                            while($row = mysqli_fetch_array($sql)) {
                        ?>
                        <form action="cartcheckupdate.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" id="cart_id" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                                <input type="hidden" value="<?php echo $row['item_id'] ?? 0; ?>" name="item_id">
                                <label for="itemqty" class="form-label">จำนวน</label>
                                <input type="number" class="form-control" id="itemqty" name="itemqty" value='<?php echo $row['itemqty']; ?>' min='1' max='500'>
                            </div>
                        <?php 
                            }
                        ?>
                            <a href="cart.php" class="btn btn-secondary">Go Back</a>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <br>
    <br>
    <br>




<?php
// include footer.php file
include ('footer.php');

?>

<?php 
}
?>