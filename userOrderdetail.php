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
                                <h2><strong>รายละเอียดสินค้า</strong></h2>
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
                                <br>
                                <hr>
                                <table class="table table-striped table-dark">
                                    <tbody>
                                        <?php
                                            $order_id = $_GET['id'];
                                            $sql = $userorder->OrderUserdetails($order_id);
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
                                    </tbody>
                                    <?php
                                    $status = $row['status'];
                                    }
                                    ?>
                                    <?php if($status=='in process'){ ?>
                                        
                                    <?php }else if($status=='success'){ ?>
    
                                    <?php }else if($status=='rejected'){ ?>
    
                                    <?php }else if($status=='finish'){ ?>
    
                                    <?php }else{ ?>
                                    <form method="post" action="userOrderUpdate.php">
                                            <input type="hidden" value="<?php echo $order_id ?>" required class="form-control" name="order_id">
                                            <tr>
                                                <td><strong class = 'text-info'>หากต้องการยกเลิก</strong></td>
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
                                    <a href="userorder.php" class="btn btn-secondary">Go Back</a>
                                    <?php if($status=='in process'){ ?>
                                        
                                    <?php }else if($status=='success'){ ?>
                                    <a href="userPDF.php?id=<?php echo $order_id; ?>" class="btn btn-danger">ดูใบเสร็จ</a>
                                    <?php }else if($status=='rejected'){ ?>

                                    <?php }else if($status=='finish'){ ?>

                                    <?php }else{
                                        echo '<button class="btn btn-primary" type="submit" name="submit">Submit</button>';
                                    }
                                    ?>
                                </td>
                                </form>
                                <?php if($status=='in process'){ ?>
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
                                                    <form action="userorder_request.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" value="<?php echo $order_id ?>" name="order_id">
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