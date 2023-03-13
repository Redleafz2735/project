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
                            <h3><strong>รายการสินค้านำเข้า</strong></h3>
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
                            <h6>
                                <nav>
                                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">รอสินค้ามาส่ง</a>
                                        <a class="nav-item nav-link" id="nav-acept-tab" data-toggle="tab" href="#nav-acept" role="tab" aria-controls="nav-acept" aria-selected="false">ตรวจสอบสินค้า</a>
                                        <a class="nav-item nav-link" id="nav-wait-tab" data-toggle="tab" href="#nav-wait" role="tab" aria-controls="nav-wait" aria-selected="false">สำเร็จแล้ว</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ยกเลิกออเดอร์</a>
                                    </div>
                                </nav>
                            </h6>
                                <div class="tab-content" id="nav-tabContent">
                                    <!--รอสินค้ามาส่ง -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <p class="font-rale text-info">รายการนำสินค้าที่สั่ง</p>
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
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $sql = $adminuser->Adminorder();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['A_fullname']; ?></td>
                                                    <td><?php echo $row['admintotal']; ?></td>
                                                    <td><?php echo $row['admin_datetime']; ?></td>
                                                    <?php $status=$row['admin_status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอสินค้า</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> ตรวจเช็คสินค้า</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><a href="adminincomedetails.php?id=<?php echo $row['adminorders_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ตรวจสอบสินค้า -->
                                    <div class="tab-pane fade" id="nav-acept" role="tabpanel" aria-labelledby="nav-acept-tab">
                                        <p class="font-rale text-info">ตรวจเช็คสินค้าที่มาส่ง</p>
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
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $sql = $adminuser->Adminorder1();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['A_fullname']; ?></td>
                                                    <td><?php echo $row['admintotal']; ?></td>
                                                    <td><?php echo $row['admin_datetime']; ?></td>
                                                    <?php $status=$row['admin_status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอสินค้า</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> ตรวจเช็คสินค้า</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><a href="adminincomedetails.php?id=<?php echo $row['adminorders_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--สำเร็จ -->
                                    <div class="tab-pane fade" id="nav-wait" role="tabpanel" aria-labelledby="nav-wait-tab">
                                        <p class="font-rale text-primary">เพิ่มสินค้าเข้าคลัง</p>
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
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $sql = $adminuser->Adminorder2();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['A_fullname']; ?></td>
                                                    <td><?php echo $row['admintotal']; ?></td>
                                                    <td><?php echo $row['admin_datetime']; ?></td>
                                                    <?php $status=$row['admin_status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอสินค้า</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> ตรวจเช็คสินค้า</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><a href="adminincomedetails.php?id=<?php echo $row['adminorders_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ยกเลิก -->
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <p class="font-rale text-info">ยกเลิกการสั่ง</p>
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
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $sql = $adminuser->Adminorder3();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['A_fullname']; ?></td>
                                                    <td><?php echo $row['admintotal']; ?></td>
                                                    <td><?php echo $row['admin_datetime']; ?></td>
                                                    <?php $status=$row['admin_status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอสินค้า</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> ตรวจเช็คสินค้า</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><a href="adminincomedetails.php?id=<?php echo $row['adminorders_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
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
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
// include footer.php file
include ('adminfooter.php');
?>
<?php 
}
?>