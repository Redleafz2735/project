<?php

// Use to fetch product data
class ProductInsert
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function Insertproduct($item_brand, $item_name, $item_price, $item_image, $item_register, $item_qty) {
        $reg = mysqli_query($this->db->con, "INSERT INTO product(item_brand, item_name, item_price, item_image, item_register, item_qty) 
        VALUES('$item_brand', '$item_name', '$item_price', '$item_image', '$item_register', '$item_qty')");
        return $reg;
    }
}
?>