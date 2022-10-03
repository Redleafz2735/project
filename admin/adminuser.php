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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                                <div class="float-right">
                                <span><i class="fa fa-users" style="color:#d8ad2e;font-size: 4rem;"></i></span>
                                </div>
                                <h1><strong>User</strong></h1> 
                                <br>
                                <hr>
                                <?php if (isset($_SESSION['success'])) { ?>
                                    <div class="alert alert-success">
                                        <?php 
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']); 
                                        ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_SESSION['error'])) { ?>
                                    <div class="alert alert-danger">
                                        <?php 
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']); 
                                        ?>
                                    </div>
                                <?php } ?>
                                <table id="myTable" class="table table-bordered table-striped"> 
                                    <thead>
                                        <th>ID</th>
                                        <th>itemname</th>
                                        <th>itembran</th>
                                        <th>itemprice</th>
                                        <th>itemimage</th>
                                        <th>itemregister</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <tbody>
                                        <?php 

                                            $sql = $innerjoin->innerjoin();
                                            while($row = mysqli_fetch_array($sql)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['item_id']; ?></td>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td><?php echo $row['productbrand']; ?></td>
                                                <td><?php echo $row['item_price']; ?> ฿</td>
                                                <td><img src=".<?php echo $row['item_image']; ?>" width="100px" height="100px" alt=" "></td>
                                                <td><?php echo $row['item_register']; ?></td>
                                                <td><a href="adminupdateproduct.php?id=<?php echo $row['item_id']; ?>" class="fas fa-edit btn btn-primary" style="font-size: 16px;">&nbsp;แก้ไข</a></td>
                                                <td><a href="admindeleteproduct.php?del=<?php echo $row['item_id']; ?>" class="fas fa-trash-alt btn btn-danger" style="font-size: 16px;">&nbsp;ลบข้อมูล</a></td>
                                            </tr>

                                        <?php 

                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<br>
<br>
<?php
// include footer.php file
include ('adminfooter.php');
?>