<?php 

    ob_start();
    session_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF รายการสินค้า</title>

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Owl-carousel CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

        <!-- Custom CSS file -->
        <link rel="stylesheet" href="style.css">

        <?php
        // require functions.php file
        require ('functions.php');
        ?>

    </head>
    <body>

    <div class="container mt-5">
    <h2 align="left"><strong>Aluminuim Shop</strong></h2>
    <h6 align="left">306/15 หมู่บ้านกฤษณาร่มเกล้า ถ.ร่มเกล้า</h6>
    <h6 align="left">แขวง/เขต มีนบุรี กรุงเทพฯ 10510</h6>
                <br>
                <h2 align="center"><strong>รายการสินค้า</strong></h2>
            <h5>รายละเอียดลูกค้า</h5>
            <h6 align="left"> คุณ <?php echo $_SESSION['fullname']; ?></h6>          
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>                        
                    </thead>
                        <?php
                        $total=0;
                        $order_id = $_GET['id'];
                        $sql = $userorder->OrderUserdetails($order_id);
                        while($row = mysqli_fetch_array($sql)) {
                        $total = $total+$row['item_price']*$row['quantity'];
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['item_price']; ?> ฿</td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                    <thaed>
                        <tr>
                            <th>รวมทั้งหมดราคา</th>
                            <th></th>
                            <hr>
                            <th><?php echo $total; ?> ฿</th>
                        </tr>
                    </thaed>
                </table>
            </div>
            <br>
            <br>
            <p align="right">ออกบิลโดย : <i>AluminumShop</i></p>
        </div>
    </div>

        <script>
            // Attach a click event to the anchor tag
            $(document).ready(function(){
                $('.edit-link').click(function(){
                // Retrieve the cart_id value from the data-cart-id attribute
                var cartId = $(this).data('cart-id');
                // Set the value of the cartId input field to the retrieved cart_id value
                $("#cartId").val(cartId);
                // Open the modal
                $("#myModal").modal();
                });
            });
        </script>
        <script>

            var gt=0;
            var iprice=document.getElementsByClassName('iprice');
            var iqty=document.getElementsByClassName('iqty');
            var itotal=document.getElementsByClassName('itotal');
            var gtotal=document.getElementById('gtotal');

            function subTotal()
            {
                gt=0;
                for(i=0;i<iprice.length;i++)
                {
                    itotal[i].innerText=(iprice[i].value)*(iqty[i].value);
                    $itotal = itotal;
                    gt=gt+(iprice[i].value)*(iqty[i].value);
                }
                gtotal.innerText=gt;
            }

            subTotal();

        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            function checkusername(val) {
                $.ajax({
                    type: 'POST',
                    url: 'checkuser_available.php',
                    data: 'username='+val,
                    success: function(data) {
                    $('#usernameavailable').html(data);
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Owl Carousel Js file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

        <!--  isotope plugin cdn  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

        <!-- Custom Javascript -->
        <script src="index.js"></script>
    </body>
</html>

<?php 
}
?>