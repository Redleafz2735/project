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
<?php
    $id = $_GET['id'];
?>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg p-30 card-responsive" style="width: 70rem;">
                    <div class="card-body">
                        <div class="font-rubik ">
                                <h2><strong>แก้ไข</strong></h2>
                                <br>
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
                                <table class="table table-striped">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>สูตร</th>
                                    </thead>
                                    <?php

                                        $sql = $adminOrder->fetchdataadminblueprint_matrial1($id);
                                        while($row = mysqli_fetch_array($sql)){
                                        $blue_id = $row['blue_id'];
                                    ?>
                                    <tbody>
                                    <form action="adminblueprint_matrialEditcheck.php" method="post">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                            <input type="hidden" value="<?php echo $row['blue_id']; ?>" name="blue_id">
                                            <td><img src="../<?php echo $row['item_image']; ?>" width="50px" height="50px" alt=" "></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><input type="number" value="<?php echo $row['M_Qty']; ?>" name="MD_Qty" min='1' max='500'></td>
                                            <?php 
                                                $sql2 = $adminOrder->fetmaterial_caculate_type();
                                                while($row2 = mysqli_fetch_array($sql2)) {
                                            ?>
                                                <td>
                                                    <select name="type_id">
                                                        <option value="<?php echo $row['type_id']; ?>" disabled selected>เลือกสูตร</option>
                                                        <?php foreach($sql2 as $row2) { ?>
                                                            <option type="text" value="<?php echo $row2['id']; ?>"><?php echo $row2['Value']; ?></option>                 
                                                        <?php }?>
                                                    </select>
                                                </td>
                                            <?php 
                                                }
                                            ?>
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                </table>
                                <a href="adminblueprint_matrial.php?id=<?php echo $blue_id; ?>" class="btn btn-secondary">Go Back</a>
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                </form>
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