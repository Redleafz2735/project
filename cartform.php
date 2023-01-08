<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">ตระกร้าสินค้า</h5>
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
            <?php 
                $total=0;
                $sql = $Cartjoin->cartjoin($_SESSION['user_id']);
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
                                <form method="post" action="cartcheck.php">
                                    <h6>
                                        <input type='number' class='text-center iqty' name="quantity" onchange='subTotal()' value='<?php echo $row['itemqty']; ?>' min='1' max='10'>
                                        <!-- ไอดีสินค้า -->
                                        <input type="hidden" value="<?php echo $row['item_id'] ?? 0; ?>" name="item_id">
                                        <!-- ราคา -->
                                        <input type="hidden" class='iprice' name="item_price" value="<?php echo $row['item_price']; ?>">
                                        <!-- ไอดีผู้ใช้ -->
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                                    </h6>
                                </div>
                                <a href="cartdeleteza.php?del=<?php echo $row['cart_id']; ?>" class="btn font-baloo text-danger px-3 border-right" style="font-size: 15px;">&nbsp;ลบ</a>
                            </div>
                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <p><span class='itotal'><?php echo $row['item_price'] ?? 0; ?></span> ฿</p>
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
                        <!-- ราคารวมทั้งหมด -->
                            <input type="hidden" id="subtotal" name="subtotal" value =<?php echo $total ?> >
                            <h5><span id="gtotal"></span> ฿</h5>
                            <button type="submit" name="submit" id="submit" class="btn btn-warning mt-3">
                                ยืนยันการสั่งซื้อ
                            </button>
                        </form>       
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>