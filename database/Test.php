<?php

// php Admin Product
class Testproduct
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function fetchdata() {
        $result = mysqli_query($this->db->con, "SELECT * FROM product");
        return $result;
    }

    public function fetchonerecord($item_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM product WHERE item_id = '$item_id'");
        return $result;
    }

    public function innerjoin() {
        $result = mysqli_query($this->db->con,
        "SELECT item_id,producttype.productbrand,item_name,item_price,item_image,item_register,item_qty FROM product
        INNER JOIN producttype
        ON product.item_brand = producttype.producttype_id
        WHERE product.item_brand");
        return $result;
    }

    public function innerjoinupdade($item_id) {
        $result = mysqli_query($this->db->con,
        "SELECT item_id,product.item_brand,producttype.productbrand,item_name,item_price,item_image,item_register,item_qty FROM product
        INNER JOIN producttype
        ON product.item_brand = producttype.producttype_id
        WHERE product.item_id = '$item_id'");
        return $result;
    }

    public function updateproduct($item_brand, $item_name, $item_price, $item_image, $item_register, $item_qty, $item_id) {
        if ($item_image == 1){
            $result = mysqli_query($this->db->con, "UPDATE product SET 
            item_brand = '$item_brand',
            item_name = '$item_name',
            item_price = '$item_price',
            item_register = '$item_register',
            item_qty = '$item_qty'
            WHERE item_id = '$item_id'
        ");
        return $result;
        } else {
            $result = mysqli_query($this->db->con, "UPDATE product SET 
            item_brand = '$item_brand',
            item_name = '$item_name',
            item_price = '$item_price',
            item_image = '$item_image',
            item_register = '$item_register',
            item_qty = '$item_qty'
            WHERE item_id = '$item_id'
        ");
        return $result;
        }
    }

    public function deleteproduct($item_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM product WHERE item_id = '$item_id'");
        return $deleterecord;
    }

    public function deleteadmincart($A_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM admincart WHERE A_id = '$A_id'");
        return $deleterecord;
    }

    public function fetcatagory($itembrand) {
        $result = mysqli_query($this->db->con, "SELECT * FROM producttype WHERE producttype.producttype_id = '$itembrand'
        ORDER BY producttype_id asc");
        return $result;
    }

    public function fetcatagory1() {
        $result = mysqli_query($this->db->con, "SELECT * FROM producttype
        ORDER BY producttype_id asc");
        return $result;
    }
}