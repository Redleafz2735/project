<?php
ob_start();
session_start();
// include header.php file
include ('adminheader.php');
?>
<br>
<br>
<div class="container">
    <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg p-30" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                                <div class="float-right">
                                    <span><i id="iarchive" class="fas fa-box" style="color:#357ae8;font-size: 4em;"></i></span>
                                </div>
                                <h1><strong>Product</strong></h1> 
                                <a href="insert.php" class="btn btn-success">Go to Insert</a>
                                <hr>
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
                                                <td><?php echo $row['item_price']; ?> $</td>
                                                <td><img src="../<?php echo $row['item_image'];  ?>" width="100px" height="100px" alt=" "></td>
                                                <td><?php echo $row['item_register']; ?></td>
                                                <td><a href="update.php?id=<?php echo $row['item_id']; ?>" class="btn btn-primary">Edit</a></td>
                                                <td><a href="delete.php?del=<?php echo $row['item_id']; ?>" class="btn btn-danger">Delete</a></td>
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