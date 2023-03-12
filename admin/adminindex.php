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
    <div class="row">
        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-users" style="color:#d8ad2e;font-size: 3em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql = $adminuser->NumUser();
                            $countuser = mysqli_num_rows($sql);
                        ?>
                        <h2><?php echo $countuser ?></h2>
                        <p class="m-b-0">ลูกค้า</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i id="iarchive" class="fas fa-box" style="color:#357ae8;font-size: 3em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql1 = $adminuser->Numproduct();
                            $countproduct = mysqli_num_rows($sql1);
                        ?>
                        <h2><?php echo $countproduct ?></h2>
                        <p class="m-b-0">สินค้า</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-file" style="color:#9466de; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql2 = $adminuser->NumOrders();
                            $countOrders = mysqli_num_rows($sql2);

                            $sql3 = $adminuser->NummadeOrders();
                            $countmadeOrders = mysqli_num_rows($sql3);

                            $countallorder = $countOrders + $countmadeOrders;
                        ?>
                        <h2><?php echo $countallorder ?></h2>
                        <p class="m-b-0">ออเดอร์</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i id="iarchive" class="fa fa-building" style="color:#357ae8;font-size: 3em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql4 = $adminuser->Numcompany();
                            $countcompany = mysqli_num_rows($sql4);
                        ?>
                        <h2><?php echo $countcompany ?></h2>
                        <p class="m-b-0">บริษัท</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-th-large" style="color:#505050; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql5 = $adminuser->Numcatagory();
                            $countcatagory = mysqli_num_rows($sql5);
                        ?>
                        <h2><?php echo $countcatagory ?></h2>
                        <p class="m-b-0">หมวดหมู๋</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-spinner" style="color:#ad6d9c; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <?php 
                            $sql6 = $adminuser->NumOrders1();
                            $countOrders1 = mysqli_num_rows($sql6);

                            $sql7 = $adminuser->NummadeOrders1();
                            $countmadeOrders1 = mysqli_num_rows($sql7);

                            $countallorder1 = $countOrders1 + $countmadeOrders1;
                        ?>
                        <h2><?php echo $countallorder1 ?></h2>
                        <p class="m-b-0">กำลังดำเนินการ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-check-square" style="color:#28a745; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <h2> 5 </h2>
                        <p class="m-b-0">ออเดอร์สำเร็จ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-times-circle" style="color:#dc3545; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <h2> 4 </h2>
                        <p class="m-b-0">ออเดอร์ยกเลิก</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $sql8 = $adminuser->Countallorders();
            $sql9 = $adminuser->Countallorders();
            //$row2 = mysqli_fetch_array($sql8);
        ?>
        
            <div class="col-sm-12 mt-5">
                <div class="chart-container" style="position: relative; height:73.5vh; width:80vw">
                    <canvas id="myChart"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                const ctx = document.getElementById('myChart');
                var mylabel = `<?php while($chartdata = mysqli_fetch_array($sql8)){
                                    echo $chartdata['item_name'] . ",";                                   
                                }
                            ?>`
                var mydata = `<?php
                                while($chartdata1 = mysqli_fetch_array($sql9)){
                                    echo $chartdata1['quantity'] . ",";
                                }
                            ?>`;
                const chartdata = mydata.split(",")
                const chartlabel = mylabel.split(",")
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                    
                    labels: chartlabel,
                    datasets: [{
                        label: 'ยอดการขาย',
                        data: chartdata,
                        borderWidth: 1
                    }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
                </script>
            </div>

            <div class="col-sm-12 mt-5">
                <div class="chart-container" style="position: relative; height:73.5vh; width:80vw">
                    <canvas id="myChart1"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                const ctx = document.getElementById('myChart1');
                var mylabel = `<?php while($chartdata = mysqli_fetch_array($sql8)){
                                    echo $chartdata['item_name'] . ",";                                   
                                }
                            ?>`
                var mydata = `<?php
                                while($chartdata1 = mysqli_fetch_array($sql9)){
                                    echo $chartdata1['quantity'] . ",";
                                }
                            ?>`;
                const chartdata = mydata.split(",")
                const chartlabel = mylabel.split(",")
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                    
                    labels: chartlabel,
                    datasets: [{
                        label: 'ยอดการขาย',
                        data: chartdata,
                        borderWidth: 1
                    }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
                </script>
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
