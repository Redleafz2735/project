<?php 

    ob_start();
    session_start();
    if ($_SESSION['user_id'] == "") {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header("location: login.php");
    } else {
?>
<?php
        if (isset($_POST['submit'])) {
            $product = $_POST['product'];
            print_r($product);
            echo  "</br>";
            $userid = $_POST['userid'];
            print_r($userid);
            echo  "</br>";
            $color = $_POST['color'];
            print_r($color);
            echo  "</br>";
            $size = $_POST['size'];
            print_r($size);
            echo  "</br>";
            $quantity = $_POST['quantity'];
            print_r($quantity);
            echo  "</br>";
            $price = $_POST['price'];
            print_r($price);
            echo  "</br>";

        }
?>

<?php
// include header.php file
include ('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="https://assets.thehansindia.com/h-upload/2022/07/18/1303611-pro.webp" class="img-fluid">
        </div>
        <div class="col-md-6">
            <form method="POST">
                <section>
                    <label for="">product</label>
                    <input type="text" name="product" id="" value="1" class="form-control">
                    <label for="">user</label>
                    <input type="text" name="userid" id="" value="1" class="form-control">
                </section>
                <label for="">Color</label>
                <select name="color" id="color_preview" class="form-control">
                </select>
                <label for="">Size</label>
                <select name="size" id="size_preview" class="form-control">
                </select>
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="">
                <label for="">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="">
                <button type="submit " name="submit" class="btn btn-primary">SUBMIT</button>
                <script>

                    var color_data = `<?php      
                                            $sql = $user->Product();
                                            while($row = mysqli_fetch_array($sql)) {
                                                $item_name = $row['item_id'];
                                                $sql1 = $user->fetcolors($item_name);
                                                while($row1 = mysqli_fetch_array($sql1)) {
                                                    $colors = $row1['colors'];
                                                    $colors_id = $row1['colors_id'];
                                                    echo "["; print($colors); echo ","; print($colors_id); echo "]"; echo ",";
                                                }
                                            }?>`
                    
                    
                    var size_data = `<?php      
                                            $sql = $user->Product();
                                            while($row = mysqli_fetch_array($sql)) {
                                                $item_name = $row['item_id'];
                                                $sql2 = $user->fetsize($item_name);
                                                while($row2 = mysqli_fetch_array($sql2)) {
                                                    $size = $row2['size'];
                                                    $size_id = $row2['size_id'];
                                                    echo "["; print($size); echo ","; print($size_id); echo "]"; echo ",";
                                                }
                                            }?>`

                    var price_data = `<?php      
                                            $sql = $user->Product();
                                            while($row = mysqli_fetch_array($sql)) {
                                                $item_name = $row['item_id'];
                                                $sql3 = $user->fetprice($item_name);
                                                while($row3 = mysqli_fetch_array($sql3)) {
                                                    $colors_id = $row3['colors_id'];
                                                    $size_id = $row3['size_id'];
                                                    $price = $row3['price'];
                                                    $itemqty = $row3['item_qty'];
                                                    echo "["; print($colors_id); echo ","; print($size_id); echo ","; print($price); echo "]"; echo ",";
                                                }
                                            }?>`
                    
                    

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
                                                    return [[cleanData[0], cleanData[1]], cleanData[2]]
                                                }); // remove the remaining brackets and split each sub-string by ','
                    console.log(price_arr)
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
                            document.getElementById('price').value = salt
                        }
                    })

                    size_select.addEventListener('change', events => {
                        const selected_size = events.target.value
                        find_arr[1] = selected_size
                        const result = price_arr.find(item => item[0].equals(find_arr))
                        if (result) {
                            const salt = result[1]
                            document.getElementById('price').value = salt
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
            </form>
        </div>        
    </div>
</div>

<?php
// include footer.php file
include ('footer.php');
?>


<?php 
}
?>
