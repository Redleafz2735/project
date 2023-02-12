<?php 

    ob_start();
    session_start();
    if ($_SESSION['admin_id'] == "") {
        header("location: adminlogin.php");
    } else {
?>
<?php
// include header.php file
include ('adminheader.php');
?>
<style>
body  {
    background-image: url("./yousef-espanioly-c9Bh_Wf3aUw-unsplash.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
}
</style>
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
                                <h2><strong>รายละเอียดออเดอร์</strong></h2>
                                <br>
                                <hr>
                                <table class="table table-striped table-dark">
                                    <tbody>
                                        <?php
                                            $order_id = $_GET['id'];
                                            $sql = $Order->Orderinnerjoinza($order_id);
                                            while($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><strong>ชื่อสินค้า</strong></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ราคา</strong></td>
                                            <td><?php echo $row['item_price']; ?> ฿</td>
                                        </tr>
                                        <tr>
                                            <td><strong>จำนวน</strong></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                        </tr>
                                        <?php
                                        $status = $row['status']; 
                                            }
                                        ?>
                                        <?php
                                            $sql1 = $adminOrder->OrderAdminrequest($order_id);
                                            while($row1 = mysqli_fetch_array($sql1)) {
                                            $status1 = $row1['r_status'];
                                        ?>
                                            <?php if($status1=='request'){ ?>

                                            <td><strong class ='text-danger'>*สาเหตุที่ยกเลิก</strong></td>
                                            <td><?php echo $row1['details']; ?></td>

                                            <?php }else{ ?>

                                            <?php } ?>
                                        <?php
                                            }
                                        ?>
                                        <?php if($status=='in process'){ ?>
                                        <form method="post" action="adminupdateOrdersdetail.php">
                                            <input type="hidden" value="<?php echo $order_id ?>" required class="form-control" name="order_id">
                                            <tr>
                                                <td><strong>อัพเดทสถานะ</strong></td>
                                                <td>
                                                    <select class="form-control" name="status">
                                                        <option value="" disabled selected>กดที่นี่</option>
                                                        <option value="finish">รอรับสินค้าที่หน้าร้าน</option>
                                                        <option value="success">เรียบร้อย</option>
                                                        <option value="rejected">ยกเลิก</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php }else if($status=='success'){ ?>
        
                                        <?php }else if($status=='rejected'){ ?>

                                        <?php }else if($status=='finish'){ ?>
                                        <form method="post" action="adminupdateOrdersdetail.php">
                                            <input type="hidden" value="<?php echo $order_id ?>" required class="form-control" name="order_id">
                                            <tr>
                                                <td><strong>อัพเดทสถานะ</strong></td>
                                                <td>
                                                    <select class="form-control" name="status">
                                                        <option value="" disabled selected>กดที่นี่</option>
                                                        <option value="success">เรียบร้อย</option>
                                                        <option value="rejected">ยกเลิก</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php }else{ ?>
                                        <form method="post" action="adminupdateOrdersdetail.php">
                                            <input type="hidden" value="<?php echo $order_id ?>" required class="form-control" name="order_id">
                                            <tr>
                                                <td><strong>อัพเดทสถานะ</strong></td>
                                                <td>
                                                    <select class="form-control" name="status">
                                                        <option value="" disabled selected>กดที่นี่</option>
                                                        <option value="in process">กำลังเตรียมการ</option>
                                                        <option value="rejected">ยกเลิก</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <td>
                                    <a href="adminOrder.php" class="btn btn-secondary">Go Back</a>
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                </td>
                                </form> 
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
// include footer.php file
include ('adminfooter.php');
?>
<?php 
}
?>