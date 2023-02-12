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
<div class="container mt-5">
    <h1><strong>แก้ไขสินค้า</strong></h1>
    <hr>
    <?php 

            $item_id = $_GET['id'];
            $sql = $updateproduct->innerjoinupdade($item_id);
            while($row = mysqli_fetch_array($sql)) {
    ?>
    <form action="adminupdateproductCheck.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" readonly value="<?php echo $row['item_id']; ?>" required class="form-control" name="item_id">
            <?php 
                $itembrand = $row['item_brand'];
                $sql = $fetchdata->fetcatagory($itembrand);
                while($row1 = mysqli_fetch_array($sql)) {

            ?>
                <tr>
                <label for="item_brand" class="col-form-label">ประเภทสินค้า</label>
                    <td>
                        <select required class="form-control" name="item_brand">
                            <option type="text" value="<?php echo $row1['producttype_id']; ?>"><?php echo $row1['productbrand']; ?></option>                 
                            <?php foreach($sql as $row1) { ?>
                            <option type="text" value="<?php echo $row1['producttype_id']; ?>"><?php echo $row1['productbrand']; ?></option>                 
                            <?php }?>
                        </select>
                    </td>
                </tr>
            <?php 
                }
            ?>
            <input type="hidden" value="<?php echo $row['item_image']; ?>" required class="form-control" name="img2">
        </div>
        <div class="mb-3">
            <label for="item_name" class="col-form-label">ชื่อสินค้า</label>
            <input type="text" value="<?php echo $row['item_name']; ?>" required class="form-control" name="item_name">
        </div>
        <div class="mb-3">
            <label for="item_price" class="col-form-label">ราคาสินค้า</label>
            <input type="text" value="<?php echo $row['item_price']; ?>" required class="form-control" name="item_price">
        </div>
        <div class="mb-3">
            <label for="item_qty" class="col-form-label">จำนวนสินค้า</label>
            <input type="text" value="<?php echo $row['item_qty']; ?>" required class="form-control" name="item_qty">
        </div>
        <div class="mb-3">
            <label for="item_image" class="col-form-label">รูปภาพสินค้า</label>
            <input type="file" class="form-control" id="imgInput" name="item_image">
            <br>
            <img width="350px" src=".<?php echo $row['item_image']; ?>" id="previewImg" alt="">
        </div>
        <hr>
    <?php } ?>
        <a href="adminproduct.php" class="btn btn-secondary">ย้อนกลับ</a>
        <button type="submit" name="update" class="btn btn-primary">อัพเดท</button>
    </form>
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