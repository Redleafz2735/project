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
                                <h2><strong>ลงจำนวนสินค้าที่เข้า</strong></h2>
                                <br>
                                <hr>
                                <?php
                                        $id = $_GET['id'];
                                        $sql = $Order->adminOrderinnerjoinza1($id);
                                        while($row = mysqli_fetch_array($sql)) {
                                        $adminorders_id = $row['adminorders_id'];
                                ?>
                                <form action="adminincomedetailsfixupdate.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" id="adminorders_id" name="adminorders_id" value="<?php echo $adminorders_id ?>">
                                        <label for="itemqty" class="form-label">จำนวน</label>
                                        <input type="number" class="form-control" name="itemqty" value='<?php echo $row['D_qty']; ?>' min='1' max='500'>
                                    </div>
                                <?php 
                                    }
                                ?>
                                    <a href="adminincomedetails.php?id=<?php echo $adminorders_id ?>" class="btn btn-secondary">Go Back</a>
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
<br>
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