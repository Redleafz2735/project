<?php
ob_start();
session_start();
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
    <h1><strong>แก้ไขข้อผู้ใช้</strong></h1>
    <hr>
    <?php 

            $user_id = $_GET['id'];
            $sql = $adminupdateuser->fetchonerecord($user_id);
            while($row = mysqli_fetch_array($sql)) {
    ?>
    <form action="adminupdateproductCheck.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" readonly value="<?php echo $row['user_id']; ?>" required class="form-control" name="user_id">
            <label for="fullname" class="col-form-label">Fullname:</label>
            <input type="text" value="<?php echo $row['fullname']; ?>" required class="form-control" name="fullname">
        </div>
        <div class="mb-3">
            <label for="username" class="col-form-label">Username:</label>
            <input type="text" value="<?php echo $row['username']; ?>" required class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="address">Address:</label>
            <textarea name="address"cols="30" rows="10" class="form-control" required><?php echo $row['address']; ?></textarea>
        </div>
        <hr>
    <?php } ?>
        <a href="adminuser.php" class="btn btn-secondary">Go Back</a>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
<br>
<br>
<?php
// include footer.php file
include ('adminfooter.php');
?>