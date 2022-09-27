<?php

// php cart class
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
        "SELECT item_id,producttype.productbrand,item_name,item_price,item_image,item_register FROM product
        INNER JOIN producttype
        ON product.item_brand = producttype.producttype_id
        WHERE product.item_brand");
        return $result;
    }
}