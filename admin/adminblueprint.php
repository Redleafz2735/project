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
                                <span><i class="fa fa-th-large" style="color:#505050; font-size: 4rem;"></i></span>
                                </div>
                                <h1><strong>Blueprint</strong></h1>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="fa fa-plus btn btn-success" style="font-size: 17.5px;" data-toggle="modal" data-target="#exampleModal">
                                &nbsp;เพิ่มBlueprint
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
                                            <form action="admininsertblueprint.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label">ชื่อบลูปลิ้น:</label>
                                                    <input type="text" required class="form-control" name="name">
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
                                                    <img loading="lazy" width="100%" id="previewImg" alt="">
                                                    <br>
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
                                <table id="myTable" class="table table-bordered table-striped"> 
                                    <thead>
                                        <th>รหัส</th>
                                        <th>รูป</th>
                                        <th>ชื่อ</th>
                                        <th>สถานะ</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <tbody>
                                        <?php 

                                            $sql = $adminuser->fetchdatablueprint();
                                            while($row = mysqli_fetch_array($sql)) {
                                            $status = $row['b_status'];

                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><img src="../<?php echo $row['picture']; ?>" width="50px" height="50px" alt=" "></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <?php if($status=="ready") { ?>
                                                <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> พร้อมใช้งาน</button>
                                                </td> <?php } ?> <?php if($status=="NOT") { ?>
                                                <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> ไม่พร้อมใช้งาน</button></td>
                                                <?php } ?>
                                                <td><a href="adminblueprint_matrial.php?id=<?php echo $row['blue_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                                <td><a href="adminblueprintdelete.php?del=<?php echo $row['blue_id']; ?>" class="fas fa-trash-alt btn btn-danger" style="font-size: 16px;">&nbsp;ลบข้อมูล</a></td>
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
