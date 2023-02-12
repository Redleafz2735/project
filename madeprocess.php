<?php 

    session_start();
    ob_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {
?>

<?php 
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        print_r($user_id);
        echo '<br/>';
        $blue_id = $_POST['blue_id'];
        print_r($blue_id);
        echo '<br/>';
        $made_qty = $_POST['made_qty'];
        print_r($made_qty);
        echo '<br/>';
        $color = $_POST['color'];
        print_r($color);
        echo '<br/>';
        $size = $_POST['size'];
        print_r($size);
        echo '<br/>';
        $details = $_POST['details'];
        print_r($details);
        echo '<br/>';
    }
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
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                            <?php 
                                $sql = $user->fetblueprint1($blue_id);
                                while($row = mysqli_fetch_array($sql)) {
                                    $name = $row['name'];
                                }
                            ?>
                            <div class="mb-3">
                                <label for="item_brand" class="col-form-label">สินค้าที่จะสั่งทำ</label>
                                <input type="hidden" value="<?php echo $blue_id; ?>" required class="form-control" name="item_name">
                                <input type="text" readonly value="<?php echo $name; ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="made_qty" class="form-lable">จำนวน</label>
                                <input type="number" readonly class="form-control" name="made_qty" value='<?php echo $made_qty; ?>' min='1' max='500'>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="col-form-label">สี</label>
                                <input type="text" readonly value="<?php echo $color ?>" required class="form-control" name="item_name">
                            </div>
                            <div class="mb-3">
                                <label for="size">ขนาด</label>
                                <input type="text" readonly value="<?php echo $size ?>" required class="form-control" name="item_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">รายละเอียดขนาดเพิ่มเติม</label>
                                <textarea readonly class="form-control" name="details" cols="30" rows="5"><?php echo $details ?></textarea>
                            </div>
                            <hr>
                            <br>
                            <h2 class="text-center"><strong>สรุปราคาและค่าใช้จ่าย</strong></h2>
                            <hr>
                            <div class="mb-3">
                                <label class="form-lable">รายละเอียดของสินค้าที่สั่งทำ</label>
                                <table class="table">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                    </thead>
                                    <?php
                                    $sql = $user->fetblueprintmaterail($blue_id);
                                    while($row1 = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><img src="<?php echo $row1['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row1['item_name']; ?></td>
                                            <td><?php echo $row1['M_Qty']; ?></td>
                                            <td><?php echo $row1['M_Price']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                        }
                                    ?> 
                                </table>  
                            </div>
                            <div class="mb-3">
                                <label for="size">รวมทั้งหมดราคา</label>
                                <input type="text" readonly value="" required class="form-control" name="item_name">
                            </div>
                            <a href="made.php" class="btn btn-secondary">ย้อนกลับ</a>
                            <input type="submit" name="submit" id="submit" value="ดำเนินการสั่งทำ" class="btn btn-primary">
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