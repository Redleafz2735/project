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
                            <h5 class="text-center"><strong>แก้ไขจำนวน</strong></h5>
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
                            <hr>
                            <hr>
                            <?php

                                $A_id = $_GET['id'];
                                $sql = $adminOrder->Editqty($A_id);
                                while($row = mysqli_fetch_array($sql)) {
                                
                            ?>
                            <form action="admincartcheckupdate.php" method="post">
                                <div class="mb-3">
                                    <input type="hidden" id="A_id" name="A_id" value="<?php echo $row['A_id']; ?>">
                                    <input type="hidden" name="A_price" value="<?php echo $row['item_price']; ?>">
                                    <label for="itemqty" class="form-label">จำนวน</label>
                                    <input type="number" class="form-control" id="A_qty" name="A_qty" value='<?php echo $row['A_qty']; ?>' min='1' max='500'>
                                </div>
                            <?php 
                                }
                            ?>
                            <a href="admincompanyIN.php" class="btn btn-secondary">Go Back</a>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
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