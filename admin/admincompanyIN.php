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
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <th>รูป</th>
                                    <th>บริษัท</th>
                                    <th>ชื่อวัสดุ</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </thead>
                                    <?php
                                        $total=0;
                                        $sql = $adminuser->admincartfetch();
                                        while($row1 = mysqli_fetch_array($sql)) {
                                        $total=$total+$row1['A_price'];
                                        
                                    ?>
                                <tbody>
                                    <tr>
                                        <td><img src="../<?php echo $row1['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                        <td><?php echo $row1['company_name']; ?></td>
                                        <td><?php echo $row1['item_name']; ?></td>
                                        <td><?php echo $row1['A_qty']; ?></td>
                                        <td><?php echo $row1['A_price']; ?> ฿</td>
                                        <td><a href="adminupdatecompanyIN.php?id=<?php echo $row1['A_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 15px;">&nbsp;แก้ไข</a></td>
                                        <td><a href="admindeleteadmincart.php?del=<?php echo $row1['A_id']; ?>" class="fas fa-trash-alt btn btn-danger" style="font-size: 15px;">&nbsp;ลบ</a></td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                            <table class="table table-striped">
                            <form method="post" action="admincompanycheck.php">
                                <tr>
                                    <td><strong>ราคาทั้งหมด</strong></td>
                                    <td><?php echo $total; ?> ฿</td>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
                                </tr>
                            </table>
                            <button type="submit" name="submit" id="submit" class="btn btn-success">ยืนยันการซื้อ</button>
                            </form> 
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

<?php
// include footer.php file
include ('adminfooter.php');
?>
<?php 
}
?>