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
            $sql = $updateproduct->fetchonerecord($item_id);
            while($row = mysqli_fetch_array($sql)) {
    ?>
    <form action="adminupdateproductCheck.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" readonly value="<?php echo $row['item_id']; ?>" required class="form-control" name="item_id">
            <label for="item_brand" class="col-form-label">item brand:</label>
            <input type="text" value="<?php echo $row['item_brand']; ?>" required class="form-control" name="item_brand">
            <input type="hidden" value="<?php echo $row['item_image']; ?>" required class="form-control" name="img2">
        </div>
        <div class="mb-3">
            <label for="item_name" class="col-form-label">item name:</label>
            <input type="text" value="<?php echo $row['item_name']; ?>" required class="form-control" name="item_name">
        </div>
        <div class="mb-3">
            <label for="item_price" class="col-form-label">item price:</label>
            <input type="text" value="<?php echo $row['item_price']; ?>" required class="form-control" name="item_price">
        </div>
        <div class="mb-3">
            <label for="item_image" class="col-form-label">item image:</label>
            <input type="file" class="form-control" id="imgInput" name="item_image">
            <img width="350px" src=".<?php echo $row['item_image']; ?>" id="previewImg" alt="">
        </div>
        <hr>
    <?php } ?>
        <a href="adminproduct.php" class="btn btn-secondary">Go Back</a>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
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