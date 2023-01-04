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
                                <h1><strong>Orders</strong></h1>
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
                                <table id="myTable" class="table table-bordered table-striped"> 
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Productname</th>
                                        <th>itemprice</th>
                                        <th>address</th>
                                        <th>quantity</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            
                                            $sql = $Order->Orderinnerjoin();
                                            while($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['item_price']; ?> ฿</td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
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
                                            <td><a href="adminOrderdetail.php?id=<?php echo $row['id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                            <td><a href="" class="fas fa-trash-alt btn btn-danger" style="font-size: 16px;">&nbsp;ลบ</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>            
                                    </tbody>
                                </table>
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
