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
                                <h2><strong>รายละเอียดการสั่งทำ</strong></h2>
                                <br>
                                <hr>
                                <table class="table table-striped">
                                    <?php
                                        $made_id = $_GET['id'];
                                        $sql = $userorder->madeOrderUserhaed($made_id);
                                        while($row1 = mysqli_fetch_array($sql)) {
                                        $made_price = $row1['made_price'];
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
                                            <td><?php echo $row1['made_price']; ?> ฿</td>
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
                                    </thead>
                                    <?php
                                        $total = 0;
                                        $sql = $userorder->madeOrderUserdetails($made_id);
                                        while($row = mysqli_fetch_array($sql)) {
                                        $total = $total+$row['MD_price'];                                

                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><img src="<?php echo $row['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['MD_Qty']; ?> เมตร</td>
                                            <td><?php echo $row['MD_price']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        $status = $row['status'];
                                        }
                                        $vat = $made_price-$total;
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
                                </table>
                                <table class="table table-striped">
                                <?php if($status=='in process'){ ?>
                                        
                                <?php }else if($status=='success'){ ?>
        
                                <?php }else if($status=='rejected'){ ?>
        
                                <?php }else if($status=='finish'){ ?>

                                <?php }else if($status=='Acept'){ ?>
                                <form method="post" action="usermadeorderupdate.php">
                                                <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
                                                <tr>
                                                    <td><strong class='text-danger'>*หากต้องการยกเลิก</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="rejected">ยกเลิก</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                <?php }else{ ?>
                                <form method="post" action="usermadeorderupdate.php">
                                                <input type="hidden" value="<?php echo $made_id ?>" required class="form-control" name="made_id">
                                                <tr>
                                                    <td><strong class='text-danger'>*หากต้องการยกเลิก</strong></td>
                                                    <td>
                                                        <select class="form-control" name="status">
                                                            <option value="" disabled selected>กดที่นี่</option>
                                                            <option value="rejected">ยกเลิก</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                </table>
                                <td>
                                    <a href="usermadeorder.php" class="btn btn-secondary">กลับไป</a>
                                        <?php if($status=='in process'){ ?>
                                                
                                        <?php }else if($status=='success'){ ?>
                                    <a href="usermadePDF.php?id=<?php echo $made_id; ?>" class="btn btn-danger">Download PDF</a>

                                        <?php }else if($status=='rejected'){ ?>
            
                                        <?php }else if($status=='finish'){ ?>
                                        
                                        <?php }else if($status=='Acept'){ ?>
                                            <button class="btn btn-danger" type="submit" name="submit">ยกเลิก</button>
                                        <?php }else{ ?>
                                            <button class="btn btn-danger" type="submit" name="submit">ยกเลิก</button>
                                        <?php } ?>
                                    </form>
                                    <?php if($status=='Acept'){ ?>
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
                                                    <form action="userorder_Acept.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" value="<?php echo $made_id ?>" name="made_id">
                                                            <table class="table table-striped">
                                                                <th>สินค้า</th>
                                                                <th>จำนวน</th>
                                                                <th>ราคา</th>
                                                                <?php
                                                                    $sql = $userorder->madeOrderUserhaed($made_id);
                                                                    while($row2 = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row2['name']; ?></td>
                                                                    <td><?php echo $row2['made_qty']; ?></td>
                                                                    <td><?php echo $row2['made_price']; ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">กลับไป</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }else if($status=='in process'){ ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                            ขอยกเลิก
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">คำร้องขอยกเลิก</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="usermadeorder_request.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" value="<?php echo $made_id ?>" name="made_id">
                                                            <div class="mb-3">
                                                                <label for="status" class="col-form-label">คำร้องขอยกเลิก</label>
                                                                <select name="status" required class="form-control">
                                                                    <option value="request">ขอยกเลิก</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-lable">สาเหตุที่ยกเลิก</label>
                                                                <textarea class="form-control" name="details" cols="30" rows="5"></textarea>
                                                            </div>
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
<br>
<br>
<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>