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
        $blue_id = $_POST['blue_id'];
        $made_qty = $_POST['made_qty'];
        $color = $_POST['color'];
        $width_cm = $_POST['width'];
        $height_cm = $_POST['height'];

        $width = $width_cm / 100;
        $height = $height_cm / 100;
        $area = $width * $height;
        print_r($area);

    }
?>

<?php
// include header.php file
include ('header.php');
?>
<?php

    $total = 0;
    $sql1 = $user->fetblueprintmaterail($blue_id);
    while($row1 = mysqli_fetch_array($sql1)) {

    if($area <= '1'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*70/100;
    }else if($area <= '5'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*65/100;
    }else if($area <= '10'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*60/100;
    }else if($area <= '15'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*55/100;
    }else if($area <= '20'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*50/100;
    }else if($area <= '25'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*45/100;
    }else if($area <= '30'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*40/100;
    }else if($area <= '36'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*35/100;
    }else if ($area >= '37'){
        $MQTY = $row1['M_Qty']*$made_qty;
        $price = $row1['item_price']-$row1['item_price']*20/100;
    }

    }
?>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                <div class="card-body">
                    <div class="font-rubik ">
                        <h2 class="text-center"><strong>ประเมินราคาและค่าใช้จ่าย</strong></h2>
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
                                <label for="item_brand" class="col-form-label">รายละเอียดของสินค้าที่สั่งทำ</label>
                                <input type="hidden" value="<?php echo $blue_id; ?>" required class="form-control" name="blue_id">
                                <input type="text" readonly value="<?php echo $name; ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="made_qty" class="form-lable">จำนวน</label>
                                <input type="number" readonly class="form-control" name="made_qty" value='<?php echo $made_qty; ?>' min='1' max='500'>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="col-form-label">สี</label>
                                <input type="text" readonly value="<?php echo $color ?>" required class="form-control" name="color">
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">ความกว้าง</label>
                                <input type="text" class="form-control" id="width" name="width" readonly value="<?php echo $width_cm ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">ความยาว</label>
                                <input type="text" class="form-control" id="height" name="height" readonly value="<?php echo $height_cm ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-lable">วัสดุดังนี้</label>
                                <table class="table">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>ราคา(ต่อชิ้น)</th>
                                    </thead>
                                    <?php
                                        $sql1 = $user->fetblueprintmaterail($blue_id);
                                        while($row1 = mysqli_fetch_array($sql1)) {
                                        $MQTY = $row1['M_Qty']*$made_qty;
                                        
                                        if($area <= '1'){
                                            $price = $row1['item_price']-$row1['item_price']*70/100;
                                            $total = $total+$price*$MQTY;                                
                                        } else if($area <= '5'){
                                            $price = $row1['item_price']-$row1['item_price']*65/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '10'){
                                            $price = $row1['item_price']-$row1['item_price']*60/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '15'){
                                            $price = $row1['item_price']-$row1['item_price']*55/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '20'){
                                            $price = $row1['item_price']-$row1['item_price']*50/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '25'){
                                            $price = $row1['item_price']-$row1['item_price']*45/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '30'){
                                            $price = $row1['item_price']-$row1['item_price']*40/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if($area <= '36'){
                                            $price = $row1['item_price']-$row1['item_price']*35/100;
                                            $total = $total+$price*$MQTY;  
                                        }else if ($area > '36'){
                                            $price = $row1['item_price']-$row1['item_price']*20/100;
                                            $total = $total+$price*$MQTY;  
                                        }
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><img src="<?php echo $row1['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row1['item_name']; ?></td>
                                            <td><?php echo $MQTY; ?></td>
                                            <td><?php echo $price; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                        }
                                    $vat = $total*35/100;
                                    $trueprice = $vat+$total;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>ค่าอุปกรณ์เพิ่มเติม+ค่าแรง</td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $vat; ?></td>
                                            <hr>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                            <div class="">
                                <label for="size">รวมทั้งหมดราคา</label>
                            </div>
                            <div class="mb-3">
                                <label for="size" class = "text-danger">*ราคาจะมีการปรับเปลี่ยนตามรายละเอียดที่ลูกค้าสั่ง โดนตอนนี้เป็นการประเมินข้างต้นเท่านั้น</label>
                                <input type="text" readonly value="<?php echo $trueprice; ?>" required class="form-control" name="made_price">
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