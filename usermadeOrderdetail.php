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
                                <table class="table table-striped table-dark">
                                    <tbody>
                                        <?php
                                            $made_id = $_GET['id'];
                                            $sql = $userorder->madeOrderUserdetails($made_id);
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
                                        <tr>
                                            <td><strong>รายละเอียด</strong></td>
                                            <td><?php echo $row['details']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                    }
                                    ?>
                                </table>
                                <td>
                                    <a href="usermadeorder.php" class="btn btn-secondary">Go Back</a>
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