<?php 

    ob_start();
    session_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {
?>



<?php
// include header.php file
include ('header.php');
?>
    
    <div class="container">
        <h1 class="mt-5">User Profile</h1>
        <hr>
        <?php 

            $user_id = $_SESSION['user_id'];
            $sql = $updateuser->fetchonerecord($user_id);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="checkupdate.php" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" name="fullname" 
                    value="<?php echo $row['fullname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" onblur="checkusername(this.value)"
                    value="<?php echo $row['username']; ?>" required>
                <span id="usernameavailable"></span>
            <div class="mb-3">
                <label for="address">ที่อยู่</label>
                <textarea name="address"cols="30" rows="10" class="form-control" required><?php echo $row['address']; ?></textarea>
            </div>
            <?php } ?>
            <button type="submit" name="submit" id="submit" class="btn btn-success">Update</button>
        </form>
        <br>
        <br>
    </div>


<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>