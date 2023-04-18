<!--   product  -->
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['special_price_submit'])){

            $item_id = $_POST['item_id'];
            // call method addToCart
            if (empty($_POST['size'])) {
                echo "<script>alert('กรุณาเลือกขนาด');</script>";
                echo "<script>window.location.href='product.php?item_id=$item_id'</script>";
            } else if (empty($_POST['colors'])) {
                echo "<script>alert('กรุณาเลือกสี');</script>";
                echo "<script>window.location.href='product.php?item_id=$item_id'</script>";
            }
            $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $_POST['itemqty'], $_POST['size'], $_POST['colors']);
        }
    }
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <section id="banner-area">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                        </div>
                        <div class="item">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                        </div>
                        <div class="item">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                        </div>
                    </div>
                </section>
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">

                    </div>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <br>
                        <!-- order-details -->
                        <label for="">ราคา(ต่อชี้น)</label></br>
                        <p id="priceshow"></p>
                        <input type="text" hidden name="price" id="price" class="form-control" value="">

                        <label for="">จำนวนคงเหลือ</label>
                        <p id="quantityshow"></p>
                        <input type="text" hidden name="quantity_show" id="quantity_show" class="form-control" value="">
                        <!-- !order-details -->
                    </tr>
                    <tr class="font-rale font-size-14">
                    </tr> 
                </table> 
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">

                        </div>
                        <div class="return text-center mr-5">

                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <div class="qty d-flex">
                    <h6 class="font-baloo">ซื้อจำนวน</h6>
                    <div class="text-center px-4 font-rale">
                        <input type="number" class="text-center" name="itemqty" value="1" min='1' max='10'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <h6 class="font-baloo">สึ</h6>
                        <select class="form-control form-control-sm" name="colors" id="color_preview">
                            <option value="" disabled selected>เลือกสี</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <h6 class="font-baloo">ขนาด</h6>
                        <select class="form-control form-control-sm" name="size" id="size_preview">
                            <option value="" disabled selected>เลือกขนาด</option>
                        </select>
                    </div>
                </div>
                <hr>
                <!-- size -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <Big>มารับสินค้าได้ที่หน้าร้าน</Big>
                    <Big>ขายโดย<a href="#">Aluminium Shop</a></Big>
                    <Big><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;306/15 หมู่บ้านกฤษณาร่มเกล้า ถ.ร่มเกล้า แขวง/เขต มีนบุรี กรุงเทพฯ 10510</Big>
                </div>
                <div class="size my-3">

                </div>
                <!-- !size -->
                <script>
                    var color_data = `<?php      
                                                $sql1 = $user->fetcolors($item['item_id']);
                                                while($row1 = mysqli_fetch_array($sql1)) {
                                                    $colors = $row1['colors'];
                                                    $colors_id = $row1['colors_id'];
                                                    echo "["; print($colors); echo ","; print($colors_id); echo "]"; echo ",";
                                                }
                                            ?>`
                    
                    
                    var size_data = `<?php      
                                                $sql2 = $user->fetsize($item['item_id']);
                                                while($row2 = mysqli_fetch_array($sql2)) {
                                                    $size = $row2['size'];
                                                    $size_id = $row2['size_id'];
                                                    echo "["; print($size); echo ","; print($size_id); echo "]"; echo ",";
                                                }
                                            ?>`

                    var price_data = `<?php      
                                                $sql3 = $user->fetprice($item['item_id']);
                                                while($row3 = mysqli_fetch_array($sql3)) {
                                                    $colors_id = $row3['colors_id'];
                                                    $size_id = $row3['size_id'];
                                                    $price = $row3['price'];
                                                    $itemqty = $row3['item_qty'];
                                                    echo "["; print($colors_id); echo ","; print($size_id); echo ","; print($price); echo ","; print($itemqty); echo "]"; echo ",";
                                                }
                                            ?>`
                    
                    

                    const color_arr = color_data.replace(/'/g, '"') // replace single quotes with double quotes
                                                .slice(0, -1) // remove the trailing comma
                                                .split('],') // split the string by '],'
                                                .map(subStr => subStr.replace(/\[|\]/g, '').split(',')); // remove the remaining brackets and split each sub-string by ','
                    

                    const size_arr = size_data.replace(/'/g, '"') // replace single quotes with double quotes
                                                .slice(0, -1) // remove the trailing comma
                                                .split('],') // split the string by '],'
                                                .map(subStr => subStr.replace(/\[|\]/g, '').split(',')); // remove the remaining brackets and split each sub-string by ','
                    
                    const price_arr = price_data.replace(/'/g, '"') // replace single quotes with double quotes
                                                .slice(0, -1) // remove the trailing comma
                                                .split('],') // split the string by '],'
                                                .map(subStr => {
                                                    const cleanData = subStr.replace(/\[|\]/g, '').split(',')
                                                    return [[cleanData[0], cleanData[1]], cleanData[2], cleanData[3]]
                                                }); // remove the remaining brackets and split each sub-string by ','
                    var color_preview = document.getElementById('color_preview')
                    var size_preview = document.getElementById('size_preview')

                    for(let x = 0; x < color_arr.length; x++){
                        var val = document.createElement("option")
                        val.text = `${color_arr[x][0]}`
                        val.value = `${color_arr[x][1]}`
                        color_preview.add(val)
                    }

                    for(let j = 0; j < size_arr.length; j++){
                        var val_size = document.createElement("option")
                        val_size.text = `${size_arr[j][0]}`
                        val_size.value = `${size_arr[j][1]}`
                        size_preview.add(val_size)
                    }

                    const color_select = document.querySelector('#color_preview')
                    const size_select = document.querySelector('#size_preview') 

                    let find_arr = []
                    color_select.addEventListener('change', event => {
                        const selected_color = event.target.value
                        find_arr[0] = selected_color
                        const result = price_arr.find(item => item[0].equals(find_arr))
                        if (result) {
                            const salt = result[1]
                            const salt_2 = result[2]
                            document.getElementById('priceshow').innerHTML = `${salt} ฿`
                            document.getElementById('quantityshow').innerHTML = `${salt_2} ชิ้น`
                            document.getElementById('price').value = salt
                            document.getElementById('quantity_show').value = salt_2
                        }
                    })

                    size_select.addEventListener('change', events => {
                        const selected_size = events.target.value
                        find_arr[1] = selected_size
                        const result = price_arr.find(item => item[0].equals(find_arr))
                        if (result) {
                            const salt = result[1]
                            const salt_2 = result[2]
                            document.getElementById('priceshow').innerHTML = `${salt} ฿`
                            document.getElementById('quantityshow').innerHTML = `${salt_2} ชิ้น`
                            document.getElementById('price').value = salt
                            document.getElementById('quantity_show').value = salt_2
                        }
                    })

                    Array.prototype.equals = function (array) {
                    if (!array) {
                        return false;
                    }

                    if (this.length !== array.length) {
                        return false;
                    }

                    for (let i = 0; i < this.length; i++) {
                        if (this[i] instanceof Array && array[i] instanceof Array) {
                        if (!this[i].equals(array[i])) {
                            return false;
                        }
                        } else if (this[i] !== array[i]) {
                        return false;
                        }
                    }

                    return true;
                    };


                </script>
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