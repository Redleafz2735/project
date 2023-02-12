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
                                <span><i class="fa fa-file" style="color:#9466de; font-size: 2em;"></i></span>
                                </div>
                                <h6>
                                    <nav>
                                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ออเดอร์ที่ยังไม่ได้รับ</a>
                                            <a class="nav-item nav-link" id="nav-wait-tab" data-toggle="tab" href="#nav-wait" role="tab" aria-controls="nav-wait" aria-selected="false">ออเดอร์ที่รับแล้ว</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">รอรับของหน้าร้าน</a>
                                            <a class="nav-item nav-link" id="nav-finish-tab" data-toggle="tab" href="#nav-finish" role="tab" aria-controls="nav-finish" aria-selected="false">ออเดอร์สำเร็จแล้ว</a>
                                            <a class="nav-item nav-link" id="nav-end-tab" data-toggle="tab" href="#nav-end" role="tab" aria-controls="nav-end" aria-selected="false">ออเดอร์ที่ถูกยกเลิก</a>
                                            <a class="nav-item nav-link" id="nav-request-tab" data-toggle="tab" href="#nav-request" role="tab" aria-controls="nav-request" aria-selected="false">ออเดอร์ที่ถูกขอให้ยกเลิก</a>
                                        </div>
                                    </nav>
                                </h6>
                                <div class="tab-content" id="nav-tabContent">
                                    <!--ออเดอร์รอการยืนยัน -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <p class="font-rale text-info">ออเดอร์ทั้งหมด</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                        <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                        aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?> <?php if($status=="finish") { ?>
                                                        <td> <button type="button" class="btn btn-light"><i class="fas fa-store-alt"></i> รอรับสินค้าที่หน้าร้าน</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ออเดอร์ที่ได้รับการยืนยันแล้ว -->
                                    <div class="tab-pane fade" id="nav-wait" role="tabpanel" aria-labelledby="nav-wait-tab">
                                        <p class="font-rale text-primary">ออเดอร์ที่รับแล้วกำลังเตรียมการ</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin1();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ออเดอร์ที่รอรับสินค้า -->
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <p class="font-rale text-info">รอรับสินค้าที่หน้าร้าน</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin5();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?> <?php if($status=="finish") { ?>
                                                        <td> <button type="button" class="btn btn-light"><i class="fas fa-store-alt"></i> รอรับสินค้าที่หน้าร้าน</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ออเดอร์ที่สำเร็จแล้ว -->
                                    <div class="tab-pane fade" id="nav-finish" role="tabpanel" aria-labelledby="nav-finish-tab">
                                        <p class="font-rale text-info">การสั่งซื้อที่สำเร็จแล้ว</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin2();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ออเดอร์ที่ถูกยกเลิก -->
                                    <div class="tab-pane fade" id="nav-end" role="tabpanel" aria-labelledby="nav-end-tab">
                                        <p class="font-rale text-info">ออเดอร์ที่ถูกยกเลิก</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin3();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--ออเดอร์ที่ร้องขอยกเลิก -->
                                    <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                                        <p class="font-rale text-danger">*รอพิจารณาคำขอยกเลิก</p>
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
                                                <th>ราคารวมทั้งหมด</th>
                                                <th>สถานะ</th>
                                                <th>เวลา</th>
                                                <th>ร้องขอยกเลิกออเดอร์</th>
                                                <th>รายละเอียด</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                    $sql = $adminOrder->OrderAdmin4();
                                                    while($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['subtotal']; ?></td>
                                                    <?php $status=$row['status'];
                                                        if($status=="" or $status=='NULL') { ?>
                                                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> รอรับออเดอร์</button></td>
                                                        <?php } if($status=="in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> กำลังเตรียมการ</button></td>
                                                        <?php } ?> <?php if($status=="success") { ?>
                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> เรียบร้อย</button>
                                                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                                                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ยกเลิกออเดอร์</button></td>
                                                        <?php } ?>
                                                    <td><?php echo $row['datetime']; ?></td>
                                                    <?php $status1=$row['r_status'];
                                                        if($status1=='request') { ?>
                                                            <td> <button type="button" class="btn btn-info"><span class="fa fa-cog fa-spin"
                                                                aria-hidden="true"></span> รอคำร้องยกเลิก</button></td>
                                                    <?php }?>
                                                    <td><a href="adminOrderdetail.php?id=<?php echo $row['order_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;รายละเอียด</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
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
