<!-- Shopping cart section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
            $cart = $product->getProduct($item['item_id']);
        }
    }

?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">ตระกร้าสินค้า</h5>
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
            <?php 
                $total=0;
                $sql = $Cartjoin->cartjoin();
                while($row = mysqli_fetch_array($sql)) {
                $total=$total+$row['item_price']*$row['itemqty'];
                $itotal=$row['item_price']*$row['itemqty'];
            ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $row['item_image'] ?? "../admin/assets/products/" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $row['item_name'] ?? "Unknown"; ?></h5>
                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <h6 class="font-baloo">จำนวน</h6>
                                <div class="px-4 font-rale">
                                    <h6>
                                        <input type='number' class='text-center iqty' onchange='subTotal()' value='<?php echo $row['itemqty']; ?>' min='1' max='10'>
                                    </h6>
                                </div>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $row['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <span class='itotal'><?php echo $row['item_price'] ?? 0; ?> ฿</span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                    }
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <div class="border-top py-4">
                        <h5>ยอดรวม</h5>
                            <h5 id="gtotal">ยอดรวม <?php echo $total ?></h5>
                            <h5> ฿</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning mt-3" data-toggle="modal" data-target=".bd-example-modal-xl">
                            ยืนยันการสั่งซื้อ
                        </button>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text">
                                        <h4 class="modal-title" id="myExtraLargeModalLabel"><strong>รายการที่สั่งซื้อ</strong></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-9">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">item Name</th>
                                                    <th scope="col">item image</th>
                                                    <th scope="col">item Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">total</th>
                                                    <th scope="col">Deleate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                    $sql = $Cartjoin->cartjoin();
                                                    while($row = mysqli_fetch_array($sql)) {

                                                    ?>
                                                    <tr>
                                                    <form method="post">
                                                        <input type="text" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                                                        <td><?php echo $row['cart_id']; ?></td>
                                                        <input type="text" name="item_id" value="<?php echo $row['item_id'] ?? '1'; ?>">
                                                        <td><?php echo $row['item_name']; ?></td>
                                                        <td><img src="<?php echo $row['item_image']; ?>" width="100px" height="100px" alt=" "></td>
                                                        <td><?php echo $row['item_price']; ?><input type="hidden" class='iprice' value="<?php echo $row['item_price']; ?>"> ฿</td>
                                                        <td><input type='number' class='text-center iqty' onchange='subTotal()' value='<?php echo $row['itemqty']; ?>' min='1' max='10'></td>
                                                        <input type="text" name="quantity" value="<?php echo $row['itemqty']; ?>">
                                                        <input type="text" name="item_price" value="<?php echo $row['item_price']; ?>">
                                                        <td class='itotal'></td>
                                                        <input type="text" id="subtotal" name="subtotal" value =<?php echo $total ?> >
                                                        <td>
                                                            <input type="hidden" value="<?php echo $row['item_id'] ?? 0; ?>" name="item_id">
                                                            <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                                        </td>
                                                    </form>
                                                    </tr>
                                                
                                                    <?php 
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-4 mt-4">
                                            <div class="border bg-light rounded p-4">
                                                <h4>รวมทั้งหมดราคา</h4>
                                                <h5 id="gtotal"></h5>
                                                <form action="">
                                                   <label class="form-check-label" for="exampleRadios1">
                                                        เก็บเงินปลายทาง
                                                   <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                  </label>
                                                </div>
                                                <br>
                                                    <button type="button" class="btn btn-primary btn-block">สั่งซื้อ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ย้อนกลับ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
