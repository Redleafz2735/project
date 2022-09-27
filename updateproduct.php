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
        <h1 class="mt-5">Infomation Page</h1>
        <a href="insert.php" class="btn btn-success">Go to Insert</a>
        <hr>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped">
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
                            <td><img src="<?php echo $row['item_image']; ?>" width="100px" height="100px" alt=""></td>
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


<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>