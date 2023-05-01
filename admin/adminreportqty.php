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
<br>
<br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h4>สรุปสินค้าคงเหลือ</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="form-group col-md-4">
                                <label>Product:  </label>
                                <select class="custom-select" name="item_id" id="item_id" required>
                                    <option value="">--Select Product--</option>
                                    <option value="14">กล่องเรียบ</option>
                                    <option value="Egg">Egg</option>
                                </select>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label>คลิกเพื่อค้นหา</label> <br>
                                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table=borderd">
                            <thead>
                                <tr>
                                    <th>สินค้า</th>
                                    <th>สี</th>
                                    <th>ขนาด</th>
                                    <th class="text-right">จำนวนคงเหลือ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_GET['item_id'])){
                                    $item_id = $_GET['item_id'];

                                    $sql = $adminuser->watchmadeOrdersqty($item_id);

                                    if(mysqli_num_rows($sql) > 0)
                                    {
                                        foreach($sql as $row)
                                        {
                                            //echo $row['fullname'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td><?php echo $row['colors']; ?></td>
                                                <td><?php echo $row['size']; ?></td>
                                                <?php 
                                                    if($row['item_qty'] >= $row['limit_qty']){
                                                ?>
                                                <td class="text-right"><?php echo $row['item_qty']; ?></td>
                                                <?php 
                                                    }else if($row['item_qty'] <= $row['limit_qty']){
                                                ?>
                                                <td class="text-right text-danger"><?php echo $row['item_qty']; ?> (สินค้าใกล้จะหมด)</td>
                                                <?php } ?>        
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "ไม่มีข้อมูลในระบบ";
                                        echo "</br>";
                                        echo "</br>";
                                    }
                                }
                                
                            ?>
                            </tbody>
                        </table>
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
