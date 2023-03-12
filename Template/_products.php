<!--   product  -->
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['special_price_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $_POST['itemqty']);
        }
    }
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                            <div class="qty d-flex">
                                <h5 class="font-baloo">ซื้อจำนวน</h5>
                                <div class="text-center px-4 font-rale">
                                    <input type="number" class="text-center" name="itemqty" value="1" min='1' max='10'>
                                </div>
                            </div>
                            <br>
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                            }else if($item['item_qty']==0){
                                echo '<button type="submit" disabled class="btn btn-danger font-size-16 form-control">SOLD OUT</button>';
                            }else{
                                echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                            }
                            ?>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">

                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>ราคา</td>
                        <td class="font-size-20 text-danger"><span> <?php echo $item['item_price'] ?? 0; ?> ฿</span><small class="text-dark font-size-12">&nbsp;&nbsp;รวมภาษีแล้ว</small></td>
                    </tr> 
                </table> 
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 วัน <br> เปลี่ยนสินค้า</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 เดือน <br>ประกัน</a>
                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <Big>มารับสินค้าได้ที่หน้าร้าน</Big>
                    <Big>ขายโดย<a href="#">Aluminium Shop</a></Big>
                    <Big><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;306/15 หมู่บ้านกฤษณาร่มเกล้า ถ.ร่มเกล้า แขวง/เขต มีนบุรี กรุงเทพฯ 10510</Big>
                </div>
                <!-- !order-details -->
                <br>
                <div class="row">
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">จำนวนคงเหลือ</h6>
                            <div class="px-4 font-rale">
                                <h6><?php echo $item['item_qty'] ?? 0; ?></h6>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>

                <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">ขนาด :</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">มาตรฐาน</button>
                        </div>
                    </div>
                </div>
                <!-- !size -->


            </div>
            <div class="col-12">
                <h6 class="font-rubik">รายละเอียดสินค้า</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?>