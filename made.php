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
                        <form action="checkmade.php" method="post">
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
                            <?php 

                                $sql = $fetchdata->fetcatagory();
                                while($row1 = mysqli_fetch_array($sql)) {

                            ?>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                            <div class="mb-3">
                                <label for="item_brand" class="col-form-label">ประเภทสินค้า</label>
                                    <select required class="form-control" name="made_type">
                                    <option>เลือกประเภทสินค้า</option>
                                    <?php foreach($sql as $row1) { ?>
                                    <option type="text" value="<?php echo $row1['producttype_id']; ?>"><?php echo $row1['productbrand']; ?></option>                 
                                    <?php }?>
                                </select>
                            </div>
                            <?php 
                                }
                            ?>
                            <div class="mb-3">
                                <label for="equidment" class="col-form-label">วัสดุอุปกรณ์</label>
                                <select name="equidment" required class="form-control">
                                    <option>เลือกวัสดุอุปกรณ์</option>
                                    <option>อลูมิเนียม</option>
                                    <option>อลูมิเนียมลายไม้</option>
                                    <option>อลูมิเนียมอบ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="col-form-label">สี</label>
                                <select name="color" required class="form-control">
                                    <option>สีขาว</option>
                                    <option>สีดำ</option>
                                    <option>สีชา</option>
                                    <option>สีเทา</option>
                                    <option>ไม่เอาสี</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size">ขนาด</label>
                                <input type="text" name="size" class="form-control" id="size" placeholder="กรอกขนาดที่จะสั่ง เช่น 130*50 cm">
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">รายละเอียดเพิ่มเติม</label>
                                <textarea class="form-control" name="details" cols="30" rows="5"></textarea>
                            </div>
                            <input type="submit" name="submit" id="submit" value="บันทึกข้อมูล" class="btn btn-primary">
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