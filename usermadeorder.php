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
                                <h3><strong>ออเดอร์การสั่งทำของฉัน</strong></h3>
                                <br>
                                <p class="font-rale text-danger">*หากต้องการยกเลิกออเดอร์ให้แจ้งเข้ามาในไลน์</p>
                                <p class="font-rale text-danger">*Admin จะทำการอัพเดทราคา หากมีข้อสงสัยใดๆให้แจ้งเข้ามาในไลน์</p>
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
                                        <th>ชื่อ</th>
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th>สถานะ</th>
                                        <th>รายละเอียด</th>
                                    </thead>

                                    <tbody>
                                        <?php

                                            $user_id = $_SESSION['user_id'];
                                            $sql = $userorder->madeOrderUser($user_id);
                                            while($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['productbrand']; ?></td>
                                            <td><?php echo $row['made_price']; ?></td>
                                            <?php $status=$row['status'];
                                                if($status=="" or $status=='NULL') { ?>
                                                <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอคำนวณราคา</button></td>
                                                <?php } if($status=="in process") { ?>
                                                    <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                        aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                <?php } ?> <?php if($status=="success") { ?>
                                                <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                <?php } ?>
                                            <td><a href="usermadeOrderdetail.php?id=<?php echo $row['made_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>            
                                    </tbody>
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
<br>
<br>
<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>