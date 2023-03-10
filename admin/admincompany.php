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
                            <div class="card-deck">
                            <?php
                                $sql = $adminOrder->company();
                                while($row = mysqli_fetch_array($sql)) {
                            ?>
                                <div class="card md-4">
                                    <img src="../<?php echo $row['company_image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row['company_name']; ?></h5>
                                    <p class="card-text">ขายวัสดุอุปกรณ์อลูมิเนียมราคากันเอง</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="admincompanydetail.php?id=<?php echo $row['company_id']; ?>" class="btn btn-primary">สั่งซื้อ</a>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
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
