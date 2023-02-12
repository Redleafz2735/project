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
                                    <span><i id="iarchive" class="fas fa-box" style="color:#357ae8;font-size: 4rem;"></i></span>
                                </div>
                                <h1><strong>Product</strong></h1> 
                                <!-- Button trigger modal -->
                                <button type="button" class="fa fa-plus btn btn-success" style="font-size: 17.5px;" data-toggle="modal" data-target="#exampleModal">
                                &nbsp;เพิ่มสินค้า
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="admininsertproduct.php" method="post" enctype="multipart/form-data">
                                                <?php 

                                                    $sql = $fetchdata->fetcatagory1();
                                                    while($row1 = mysqli_fetch_array($sql)) {

                                                ?>
                                                <div class="mb-3">
                                                    <tr>
                                                    <label for="item_brand" class="col-form-label">ประเภทสินค้า</label>
                                                        <td>
                                                            <select required class="form-control" name="item_brand">
                                                                <option>เลือกประเภทสินค้า</option>
                                                                <?php foreach($sql as $row1) { ?>
                                                                <option type="text" value="<?php echo $row1['producttype_id']; ?>"><?php echo $row1['productbrand']; ?></option>                 
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <?php 
                                                    }
                                                ?>
                                                <div class="mb-3">
                                                    <label for="item_name" class="col-form-label">ชื่อสินค้า</label>
                                                    <input type="text" required class="form-control" name="item_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_price" class="col-form-label">ราคาสินค้า</label>
                                                    <input type="text" required class="form-control" name="item_price">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_qty" class="col-form-label">จำนวนสินค้า</label>
                                                    <input type="text" required class="form-control" name="item_qty">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_image" class="col-form-label">รูปภาพสินค้า</label>
                                                    <input type="file" required class="form-control" id="imgInput" name="item_image">
                                                    <img loading="lazy" width="100%" id="previewImg" alt="">
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
                                        <th>ID</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ประเภทสินค้า</th>
                                        <th>จำนวนสินค้า</th>
                                        <th>ราคาสินค้า</th>
                                        <th>รูปภาพสินค้า</th>
                                        <th>เวลาที่สินค้าถูกเพิ่ม</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </thead>

                                    <tbody>
                                        <?php 

                                            $sql = $innerjoin->innerjoin();
                                            while($row = mysqli_fetch_array($sql)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['item_id']; ?></td>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td><?php echo $row['productbrand']; ?></td>
                                                <td><?php echo $row['item_qty']; ?></td>
                                                <td><?php echo $row['item_price']; ?> ฿</td>
                                                <td><img src=".<?php echo $row['item_image']; ?>" width="100px" height="100px" alt=" "></td>
                                                <td><?php echo $row['item_register']; ?></td>
                                                <td><a href="adminupdateproduct.php?id=<?php echo $row['item_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 15px;">&nbsp;แก้ไข</a></td>
                                                <td><a href="admindeleteproduct.php?del=<?php echo $row['item_id']; ?>" class="fas fa-trash-alt btn btn-danger" style="font-size: 15px;">&nbsp;ลบ</a></td>
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
