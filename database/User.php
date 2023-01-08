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

    public function insertOrder($user_id, $subtotal, $status) {
        $reg = mysqli_query($this->db->con, "INSERT INTO orders(user_id, subtotal) VALUES('$uuid', '$user_id', '$subtotal', '$status')");
        return $reg;
    }

    public function insertDataOrder($uuid, $user_id, $subtotal, $status, $item_id, $item_price, $quantity)
    {
        // Start the transaction
        mysqli_begin_transaction($this->db->con);

        try {

            // Insert the UUID into the oder table
            $sql = "INSERT INTO oders(oder_id, user_id, subtotal) VALUES('$uuid', '$user_id', '$subtotal', '$status')";
            mysqli_query($this->db->con, $sql);

            // Insert the UUID into the oder_detail table
            $sql = "INSERT INTO oder_details(oder_id, item_id, item_price, quantity) VALUES('$uuid', '$item_id', '$item_price', '$quantity')";
            mysqli_query($this->db->con, $sql);

            // Commit the transaction
            mysqli_commit($this->db->con);
        } catch (Exception $e) {
            // Rollback the transaction if any errors occur
            mysqli_rollback($this->db->con);
            throw $e;
        }
        
    }

}