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
<?php
    $total=0;
    $made_id = $_GET['id'];
    $sql = $userorder->madeOrderUserdetails($made_id);
    while($rowza = mysqli_fetch_array($sql)) {
    $total=$total+$rowza['MD_price'];
    $status = $rowza['status'];
    }
    $vat = $total*35/100;
    $total = $vat+$total;
?>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                            <div class="float-right">
                                <span><i class="fa fa-file" style="color:#9466de; font-size: 2.5em;"></i></span>
                                </div>
                                <h2><strong>รายละเอียดการสั่งทำ</strong></h2>
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
                                <table class="table table-striped">
                                    <?php
                                        $sql = $userorder->madeOrderUserhaed($made_id);
                                        while($row1 = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><strong>ชื่อสินค้า</strong></td>
                                            <td><?php echo $row1['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>สี</strong></td>
                                            <td><?php echo $row1['color']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>จำนวน</strong></td>
                                            <td><?php echo $row1['made_qty']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ราคา</strong></td>
                                            <td><?php echo $total ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ขนาดความกว้าง</strong></td>
                                            <td><?php echo $row1['width']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ขนาดความยาว</strong></td>
                                            <td><?php echo $row1['height']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                    <?php
                                        $sql1 = $adminOrder->madeOrderAdminrequest($made_id);
                                        while($row2 = mysqli_fetch_array($sql1)) {
                                        $status1 = $row2['m_status'];
                                    ?>
                                            <?php if($status1=='request'){ ?>

                                            <td><strong class ='text-danger'>*สาเหตุที่ยกเลิก</strong></td>
                                            <td><?php echo $row2['m_details']; ?></td>

                                            <?php }else{ ?>

                                            <?php } ?>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <h5><strong>วัสดุที่ใช้</strong></h5>
                                <table class="table table-striped">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                        <?php if($status=='in process'){ ?>
                                        
                                        <?php }else if($status=='success'){ ?>
                
                                        <?php }else if($status=='rejected'){ ?>
                
                                        <?php }else if($status=='finish'){ ?>
        
                                        <?php }else if($status=='Acept'){ ?>
                                        <th>แก้ไข</th>
                                        <?php }else{ ?>
                                        <th>แก้ไข</th>
                                        <?php } ?>
                                    </thead>
                                    <?php
                                        $sql = $userorder->madeOrderUserdetails($made_id);
                                        while($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tbody>
                                    
                                        <tr>
                                            <td><img src="../<?php echo $row['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['MD_Qty']; ?></td>
                                            <td><?php echo $row['MD_price']; ?></td>
                                            <?php if($status=='in process'){ ?>
                                        
                                            <?php }else if($status=='success'){ ?>
                    
                                            <?php }else if($status=='rejected'){ ?>
                    
                                            <?php }else if($status=='finish'){ ?>
            
                                            <?php }else if($status=='Acept'){ ?>
                                            <td><a href="adminmadeOrderdetail1.php?id=<?php echo $row['id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                            <?php }else{ ?>
                                            <td><a href="adminmadeOrderdetail1.php?id=<?php echo $row['id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><strong>ค่าอุปกรณ์เพิ่มเติม+ค่าแรง</strong></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $vat; ?></td>
                                                <hr>
                                            </tr>
                                        </tbody>
                                        <?php if($status=='in process'){ ?>
                                            <form method="post" action="adminupdatemadeOrdersdetail.php">
                                                <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
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
                                            <form method="post" action="adminupdatemadeOrdersdetail.php">
                                                <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
                                                <tr>
                                                    <td><strong>อัพเดทสถานะ</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="success">เรียบร้อย</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                        <?php }else if($status=='Acept'){ ?>

                                        <?php }else{ ?>
                                            <form method="post" action="adminupdatemadeOrdersdetail1.php">
                                                <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
                                                <input type="hidden" value="<?php echo $total ?>" required class="form-control" name="made_price">
                                                <tr>
                                                    <td><strong>อัพเดทสถานะ</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="Acept">รอยืนยันจากลูกค้า</option>
                                                            <option value="rejected">ยกเลิก</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="adminmadeOrder.php" class="btn btn-secondary">Go Back</a>
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                <?php if($status=='success'){ ?>
                                <a href="adminPDF.php?id=<?php echo $made_id; ?>" class="btn btn-secondary">Download PDF</a>
                                <?php }?>
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
<br>
<br>
<?php
// include footer.php file
include ('adminfooter.php');
?>
<?php 
}
?>