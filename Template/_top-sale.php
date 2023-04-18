<!-- Top Sale -->
<?php

    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $_POST['itemqty'], $_POST['size'], $_POST['colors']);
        }
    }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "."; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                        <div class="price py-2">
                            <span><?php echo $item['item_price'] ?? '0' ; ?> ฿</span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                            <input type="hidden" name="itemqty" value="1">
                            <input type="hidden" name="size" value="1">
                            <input type="hidden" name="colors" value="1">
                            <?php
                            if (in_array($item['item_id'], $in_cart ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else if($item['item_qty']==0){
                                echo '<button type="submit" disabled class="btn btn-danger font-size-12">SOLD OUT</button>';
                            }else{
                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->