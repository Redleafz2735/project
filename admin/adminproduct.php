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
                <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                                <div class="float-right">
                                    <span><i id="iarchive" class="fas fa-box" style="color:#357ae8;font-size: 4em;"></i></span>
                                </div>
                                <h1><strong>Product</strong></h1> 
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Go to insert
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Insert Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="admininsertproduct.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="item_brand" class="col-form-label">itembrand:</label>
                                                    <input type="text" required class="form-control" name="item_brand">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_name" class="col-form-label">itemname:</label>
                                                    <input type="text" required class="form-control" name="item_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_price" class="col-form-label">itemprice:</label>
                                                    <input type="text" required class="form-control" name="item_price">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_image" class="col-form-label">item Image:</label>
                                                    <input type="file" required class="form-control" id="imgInput" name="item_image">
                                                    <img loading="lazy" width="100%" id="previewImg" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <td><a href="adminupdateproduct.php?id=<?php echo $row['item_id']; ?>" class="btn btn-primary">Edit</a></td>
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