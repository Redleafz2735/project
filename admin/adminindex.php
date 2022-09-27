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
        <div class="col-md-3 center">
            <div class="card shadow p-30" style="width: 15rem;">
                <div class="card-body">
                    <div class="float-left">
                        <span><i class="fa fa-users" style="color:#d8ad2e;font-size: 3em;"></i></span>
                    </div>
                    <div class="font-rubik text-right">
                        <h2> 3 </h2>
                        <p class="m-b-0">User/s</p>
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
                        <h2> 13 </h2>
                        <p class="m-b-0">Product/s</p>
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
                        <h2> 5 </h2>
                        <p class="m-b-0">Total Order/s</p>
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
                        <h2> 4 </h2>
                        <p class="m-b-0">Companyt/s</p>
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
                        <h2> 3 </h2>
                        <p class="m-b-0">Categories/s</p>
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
                        <h2> 2 </h2>
                        <p class="m-b-0">Pending Order</p>
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
                        <p class="m-b-0">Delivered Order/s</p>
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
                        <p class="m-b-0">Rejected Order/s</p>
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