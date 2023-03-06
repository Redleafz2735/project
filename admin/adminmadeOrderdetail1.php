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
                                <span><i class="fa fa-file" style="color:#9466de; font-size: 2.5em;"></i></span>
                                </div>
                                <h2><strong>วัสดุราคา</strong></h2>
                                <br>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                    </thead>
                                    <?php
                                        $id = $_GET['id'];
                                        $sql = $adminuser->madedetailadmin($id);
                                        while($row1 = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                        <form action="adminmadecheckupdate.php" method="post">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                            <input type="hidden" value="<?php echo $row1['made_id']; ?>" name="made_id">
                                            <td><img src="../<?php echo $row1['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row1['item_name']; ?></td>
                                            <td><input type="number" value="<?php echo $row1['MD_Qty']; ?>" name="MD_Qty" min='1' max='500'></td>
                                            <td><input type="number" value="<?php echo $row1['MD_price']; ?>" name="MD_price"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="adminmadeOrderdetail.php?id=<?php echo $row1['made_id']; ?>" class="btn btn-secondary">กลับไป</a>
                                <button type="submit" name="submit" id="submit" class="btn btn-success">ยืนยันการแก้ไข</button>
                                </form>
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
<br>
<br>
<?php
// include footer.php file
include ('adminfooter.php');
?>
<?php 
    }
?>