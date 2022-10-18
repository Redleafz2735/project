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
    <h1><strong>แก้ไขประเภทสินค้า</strong></h1>
    <hr>
    <?php 

            $producttype_id = $_GET['id'];
            $sql = $adminupdateuser->fetchonerecordproducttype($producttype_id);
            while($row = mysqli_fetch_array($sql)) {
    ?>
    <form action="adminupdateCheckcatagory.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" readonly value="<?php echo $row['producttype_id']; ?>" required class="form-control" name="producttype_id">
            <label for="productbrand" class="col-form-label">Productbrand:</label>
            <input type="text" value="<?php echo $row['productbrand']; ?>" required class="form-control" name="productbrand">
        </div>
    <?php } ?>
        <a href="admincatagory.php" class="btn btn-secondary">Go Back</a>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>
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