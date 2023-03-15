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
    $adminorders_id = $_GET['id'];
    $sql1 = $Order->adminOrderinnerjoinza($adminorders_id);
    while($row1 = mysqli_fetch_array($sql1)) {
    $status = $row1['admin_status'];
    }                                   
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
                                <h2><strong>รายละเอียดสินค้าที่นำเข้า</strong></h2>
                                <br>
                                <hr>
                                <table class="table table-striped">                                   
                                    <thead>
                                        <th>ชื่อวัสดุ</th>
                                        <th>บริษัท</th>
                                        <th>จำนวนที่สั่ง</th>
                                        <th>ราคา</th>
                                    </thead>
                                    <?php
                                        $adminorders_id = $_GET['id'];
                                        $sql = $Order->adminOrderinnerjoinza($adminorders_id);
                                        while($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['company_name']; ?></td>
                                            <td><?php echo $row['Admin_Qty']; ?></td>
                                            <td><?php echo $row['Admin_price']; ?> ฿</td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <hr>
                                <table class="table table-striped">
                                        <?php if($status=='in process'){ ?>
                                            <form method="post" action="adminupdatecomedetails.php">
                                                <input type="hidden" value="<?php echo $adminorders_id ?>" required class="form-control" name="adminorders_id">
                                                <tr>
                                                    <td><strong>อัพเดทสถานะ</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="rejected">ยกเลิก</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                        <?php }else if($status=='success'){ ?>
                
                                        <?php }else if($status=='rejected'){ ?>

                                        <?php }else{ ?>
                                            <form method="post" action="adminupdatecomedetails.php">
                                                <input type="hidden" value="<?php echo $adminorders_id ?>" required class="form-control" name="adminorders_id">
                                                <tr>
                                                    <td><strong>อัพเดทสถานะ</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="in process">สินค้ามาแล้ว</option>
                                                            <option value="rejected">ยกเลิก</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                </table>                            
                                <td>
                                    <a href="adminincome.php" class="btn btn-secondary">Go Back</a>
                                        <?php if($status=='in process'){ ?>
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        <?php }else if($status=='success'){ ?>
            
                                        <?php }else if($status=='rejected'){ ?>
            
                                        <?php }else if($status=='finish'){ ?>
                                        
                                        <?php }else if($status=='Acept'){ ?>

                                        <?php }else{ ?>
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        <?php } ?>
                                    </form>
                                    <?php if($status=='in process'){ ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                            ยืนยัน
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">ยืนยันการสั่งทำ</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="admincomerorder_Acept.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" value="<?php echo $adminorders_id ?>" name="adminorders_id">
                                                            <p>เช็คสินค้าเรียบร้อยแล้ว</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">กลับไป</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php }else{

                                } ?>
                                </td>
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