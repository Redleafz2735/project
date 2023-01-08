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
<br>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                                <div class="float-right">
                                <span><i class="fa fa-file" style="color:#9466de; font-size: 2.5em;"></i></span>
                                </div>
                                <h1><strong>Orders</strong></h1>
                                <br>
                                <hr>
                                <?php if (isset($_SESSION['success'])) { ?>
                                    <div class="alert alert-success">
                                        <?php 
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']); 
                                        ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_SESSION['error'])) { ?>
                                    <div class="alert alert-danger">
                                        <?php 
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']); 
                                        ?>
                                    </div>
                                <?php } ?>
                                <table id="myTable" class="table table-bordered table-striped"> 
                                    <thead>
                                        <th>สินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคารวม</th>
                                        <th>ลบ</th>
                                    </thead>
        
                                    <tbody>
                                        <?php 
                                            $total=0;
                                            $sql = $Cartjoin->cartjoin();
                                            while($row = mysqli_fetch_array($sql)) {
                                            $total=$total+$row['item_price']*$row['itemqty'];
                                            $itotal=$row['item_price']*$row['itemqty'];
                                        ?>
                                            <tr>
                                                <td><img src="<?php echo $row['item_image']; ?>" width="100px" height="100px" alt=" "></td>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td><input type='number' class='text-center iqty' name="quantity" onchange='subTotal()' value='<?php echo $row['itemqty']; ?>' min='1' max='10'></td>
                                                <td><?php echo $itotal; ?></td>
                                                <input type="hidden" value="<?php echo $row['item_id'] ?? 0; ?>" name="item_id">
                                                <td><a href="cartdeleteza.php?del=<?php echo $row['cart_id']; ?>" class="fas fa-trash-alt btn btn-danger" style="font-size: 15px;">&nbsp;ลบ</a></td>
                                            </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<br>
<br>
<?php

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
