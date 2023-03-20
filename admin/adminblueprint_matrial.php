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
    $sql = $adminuser->fetchdatablueprint1($blue_id);
    while($rowza = mysqli_fetch_array($sql)) {
        $name = $rowza['name'];
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
                                <h2><strong>รายละเอียด <?php echo $name ?></strong></h2>
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
                                                <?php 
                                                $sql2 = $adminOrder->fetmaterial_caculate_type();
                                                while($row2 = mysqli_fetch_array($sql2)) {
                                                ?>
                                                    <div class="mb-3">
                                                    <label for="blue_id"class="col-form-label">สูตรสินค้า</label>
                                                        <select required class="form-control" name="type_id">
                                                            <option value="" disabled selected>เลือกสูตร</option>
                                                            <?php foreach($sql2 as $row2) { ?>
                                                                <option type="text" value="<?php echo $row2['id']; ?>"><?php echo $row2['Value']; ?></option>                 
                                                            <?php }?>
                                                        </select>
                                                    </div>                           
                                                <?php 
                                                    }
                                                ?>
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
                                <?php 

                                    $sql = $adminuser->fetchdatablueprint1($blue_id);
                                    while($row1 = mysqli_fetch_array($sql)) {

                                ?>
                                <form action="adminupdateblueprintCheck.php" method="post" enctype="multipart/form-data">   
                                    <input type="hidden" readonly value="<?php echo $blue_id; ?>" required class="form-control" name="blue_id">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">ชื่อแปลน</label>
                                        <input type="text" value="<?php echo $row1['name']; ?>" required class="form-control" name="name">
                                    </div>
                                    <div class="mb-3">
                                    <label for="b_status" class="col-form-label">สถานะ</label>
                                        <select required class="form-control" name="b_status">
                                        <option value="" disabled selected>เลือกสถานะ    </option>
                                        <option type="text" value="ready">พร้อมใช้งาน</option>
                                        <option type="text" value="NOT">ไม่พร้อมใช้งาน</option>                 
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="picture" class="col-form-label">รูปภาพสินค้า</label>
                                        <input type="file" class="form-control" id="imgInput" name="picture">
                                        <br>
                                        <img width="150px" src=".<?php echo $row1['picture']; ?>" id="previewImg" alt="">
                                    </div>
                                    <input type="hidden" value="<?php echo $row1['picture']; ?>" required class="form-control" name="img2">
                                    <?php
                                        }
                                    ?>
                                    <button type="submit" name="update" class="btn btn-primary">อัพเดท</button>
                                </form>
                                <br>
                                <table class="table table-striped">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>สูตร</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </thead>
                                    <?php
                                        $sql = $adminOrder->fetchdataadminblueprint_matrial($blue_id);
                                        while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <tbody>
                                            <td><img src="../<?php echo $row['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['M_Qty']; ?></td>
                                            <td><?php echo $row['Value']; ?></td>
                                            <td><a href="adminblueprint_matrialEdit.php?id=<?php echo $row['id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                            <form method="post" action="adminblueprint_matrialDelete.php">
                                            <input type="hidden" name="blue_id" value="<?php echo $blue_id; ?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <td><button class="fas fa-trash-alt btn btn-danger" type="submit" name="submit">ลบ</button></td>
                                            </form>
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                </table>
                                <a href="adminblueprint.php" class="btn btn-secondary">Go Back</a>
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