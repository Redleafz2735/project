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
<?php
    $company_id = $_GET['id'];
    $sql = $adminOrder->companydetails($company_id);
    while($row1 = mysqli_fetch_array($sql)) {
        $company = $row1['company_name'];
    }

?>
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
                                <a href="admincompanyIN.php?id=<?php echo $company_id; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> ตระกร้าสินค้า</a>
                            </div>
                            <h3><strong><?php echo $company; ?></strong></h3>
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
                            <div class="row row-cols-1 row-cols-md-3">
                                <?php
                                    $sql = $adminOrder->companydetails($company_id);
                                    while($row = mysqli_fetch_array($sql)) {
                                ?>
                                <form action="admincompanyitem.php" method="post">
                                    <div class="col mb-4">
                                        <div class="card">
                                            <img src="../<?php echo $row['item_image']; ?>" class="card-img-top" style="width: 15rem;" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row['item_name']; ?></h5>
                                                <p class="card-text "><input type="number" class="form-control" value="1" name="item_qty" min='1' max='500'></p>
                                                <?php 
                                                $sql1 = $user->fetcolors($row['item_id']);
                                                while($row1 = mysqli_fetch_array($sql1)) {                                            
                                                ?>
                                                <p class="card-text">
                                                <select class="form-control" name="colors">
                                                    <option value="" disabled selected>เลือกสี</option>
                                                    <?php foreach($sql1 as $row1) { ?>
                                                        <option type="text" value="<?php echo $row1['colors_id']; ?>"><?php echo $row1['colors']; ?></option>                 
                                                    <?php }?>
                                                </select>
                                                </p>
                                                <?php } ?>
                                                <?php 
                                                $sql2 = $user->fetsize($row['item_id']);
                                                while($row2 = mysqli_fetch_array($sql2)) {                                          
                                                ?>
                                                <p class="card-text">
                                                <select class="form-control" name="size">
                                                    <option value="" disabled selected>เลือกขนาด</option>
                                                    <?php foreach($sql2 as $row2) { ?>
                                                        <option type="text" value="<?php echo $row2['size_id']; ?>"><?php echo $row2['size']; ?></option>                 
                                                    <?php }?>
                                                </select>
                                                </p>
                                                <?php } ?>
                                                <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
                                                <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
                                                <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                                                <button type="submit" name="submit" class="btn btn-warning font-size-18">สั่งซื้อ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <?php
                                    }
                                ?>
                            </div>
                            <br>
                            <a href="admincompany.php" class="btn btn-secondary">Go Back</a>
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
<?php 
}
?>
