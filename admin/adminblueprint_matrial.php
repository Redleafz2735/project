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
    $blue_id = $_GET['id'];
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
                                <h2><strong>รายละเอียดBlueprint</strong></h2>
                                <br>
                                <button type="button" class="fa fa-plus btn btn-success" style="font-size: 17.5px;" data-toggle="modal" data-target="#exampleModal">
                                &nbsp;เพิ่มBlueprintDetails
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="admininsertblueprintdetails.php" method="post" enctype="multipart/form-data">
                                                <?php 

                                                $sql = $adminuser->fetchdataproductforblueprint();
                                                while($row = mysqli_fetch_array($sql)) {

                                                ?>
                                                <div class="mb-3">
                                                <label for="blue_id" class="col-form-label">สินค้าที่จะสั่งทำ</label>
                                                    <select required class="form-control" name="item_id">
                                                    <option value="" disabled selected>เลือกวัสดุ</option>
                                                    <?php foreach($sql as $row) { ?>
                                                        <option type="text" value="<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></option>                 
                                                    <?php }?>
                                                </select>
                                                </div>
                                                <?php 
                                                }
                                                ?>
                                                <input type="hidden" class="form-control" value="<?php echo $blue_id ?>" name="blue_id">
                                                <div class="mb-3">
                                                    <label for="M_Qty" class="col-form-label">จำนวน:</label>
                                                    <input type="number" required class="form-control" name="M_Qty" value="1" min ="1" max = "500">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                    </thead>
                                    <?php

                                        $sql = $adminOrder->fetchdataadminblueprint_matrial($blue_id);
                                        while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <tbody>
                                            <td><img src="../<?php echo $row['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['M_Qty']; ?></td>
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                </table>
                                <a href="adminblueprint.php" class="btn btn-secondary">Go Back</a>
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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