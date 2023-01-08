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

    public function cartjoin($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT cart_id,cart.user_id,cart.item_id,item_name,item_price,item_image,cart.itemqty FROM cart
        INNER JOIN product
        ON cart.item_id = product.item_id
        WHERE cart.user_id = '$user_id'");
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

    public function insertOrder($uuid, $user_id, $subtotal, $status) {
        $reg = mysqli_query($this->db->con, "INSERT INTO orders(order_id, user_id, subtotal, status) VALUES('$uuid', '$user_id', '$subtotal', '$status')");
        return $reg;
    }

    public function insertOrderdetails($uuid, $item_id, $item_price, $quantity) {
        $reg = mysqli_query($this->db->con, "INSERT INTO order_details(order_id, item_id, item_price, quantity) VALUES('$uuid', '$item_id', '$item_price', '$quantity')");
        
    }

    public function deletecartza($cart_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM cart WHERE cart_id = '$cart_id'");
        return $deleterecord;
    }

}