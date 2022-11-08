<?php

// php cart class
class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function fetchdata() {
        $result = mysqli_query($this->db->con, "SELECT * FROM users");
        return $result;
    }

    public function fetchonerecord($user_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM users WHERE user_id = '$user_id'");
        return $result;
    }

    public function update($fullname, $address, $user_id) {
        $result = mysqli_query($this->db->con, "UPDATE users SET 
            fullname = '$fullname',
            address = '$address'
            WHERE user_id = '$user_id'
        ");
        return $result;
    }

    public function cartjoin() {
        $result = mysqli_query($this->db->con,
        "SELECT cart_id,cart.item_id,item_name,item_price,item_image,cart.itemqty FROM cart
        INNER JOIN product
        ON cart.item_id = product.item_id
        WHERE cart.item_id");
        return $result;
    }

    public function getDatacart($table = 'cart'){
        $result = $this->db->con->query("SELECT * FROM {$table} ");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}