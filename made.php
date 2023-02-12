<?php 

    session_start();
    ob_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {
?>

<?php
// include header.php file
include ('header.php');
?>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                <div class="card-body">
                    <div class="font-rubik ">
                        <h2 class="text-center"><strong>สั่งทำสินค้า</strong></h2>
                        <hr>
                        <form action="madeprocess.php" method="post">
                            <!--Text Field-->
                            <?php if(isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php 
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                            <?php 

                                $sql = $user->fetblueprint();
                                while($row = mysqli_fetch_array($sql)) {

                            ?>
                            <div class="mb-3">
                                <label for="blue_id" class="col-form-label">สินค้าที่จะสั่งทำ</label>
                                    <select required class="form-control" name="blue_id">
                                    <option value="" disabled selected>เลือกสินค้า</option>
                                    <?php foreach($sql as $row) { ?>
                                        <option type="text" value="<?php echo $row['blue_id']; ?>"><?php echo $row['name']; ?></option>                 
                                    <?php }?>
                                </select>
                            </div>
                            <?php 
                                }
                            ?>
                            <div class="mb-3">
                                <label for="made_qty" class="form-lable">จำนวน</label>
                                <input type="number" class="form-control" name="made_qty" value='1' min='1' max='500'>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="col-form-label">สี</label>
                                <select name="color" required class="form-control">
                                    <option value="" disabled selected>เลือกสี</option>
                                    <option>สีขาว</option>
                                    <option>สีดำ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size">ขนาด</label>
                                <select name="size" required class="form-control">
                                    <option value="" disabled selected>เลือกขนาด</option>
                                    <option>เล็ก</option>
                                    <option>มารตฐาน</option>
                                    <option>ใหญ่</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">รายละเอียดขนาดเพิ่มเติม</label>
                                <textarea class="form-control" name="details" cols="30" rows="5"></textarea>
                            </div>
                            <input type="submit" name="submit" id="submit" value="ประเมินราคา" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <br>
    <br>




<?php
// include footer.php file
include ('footer.php');

?>

<?php 
}
?>