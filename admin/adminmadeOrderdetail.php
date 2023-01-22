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
                                            $made_id = $_GET['id'];
                                            $sql = $Order->madeOrderinnerjoinza($made_id);
                                            while($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><strong>สินค้า</strong></td>
                                            <td><?php echo $row['productbrand']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ขนาด</strong></td>
                                            <td><?php echo $row['size']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>วัสดุ</strong></td>
                                            <td><?php echo $row['equidment']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>สี</strong></td>
                                            <td><?php echo $row['color']; ?></td>
                                        </tr>
                                        <?php 
                                            }
                                        ?> 
                                        <form method="post" action="adminupdatemadeOrdersdetail.php">
                                            <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
                                            <tr>
                                                <td><strong>สถานะ</strong></td>
                                                <td>
                                                    <select class="form-control" name="status">
                                                        <option>อัพเดทสถานะ</option>
                                                        <option value="in process">กำลังเตรียมการ</option>
                                                        <option value="success">เรียบร้อย</option>
                                                        <option value="rejected">ยกเลิก</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>ราคา</strong></td>
                                                <td><strong><input type="text" name="made_price" class="form-control" id="made_price" placeholder="กรอกราคาที่จะเสนนอลูกค้า"></strong></td>
                                            </tr>
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