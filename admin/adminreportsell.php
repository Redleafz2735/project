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
                        <h4>สรุปการขายออเดอร์ทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>จากวันที่</label>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ถึงวันที่</label>
                                        <input type="date" name="to_date" class="form-control">
                                    </div>
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
                                    <th>ชื่อ</th>
                                    <th class="text-right">ราคา</th>
                                    <th class="text-right">จำนวน</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $sql = $adminuser->watchOrdersreport($from_date, $to_date);

                                    if(mysqli_num_rows($sql) > 0)
                                    {
                                        foreach($sql as $row)
                                        {
                                            //echo $row['fullname'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td class="text-right"><?php echo $row['item_price']; ?></td>
                                                <td class="text-right"><?php echo $row['quantity']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "ไม่มีข้อมูลในระบบ";
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
