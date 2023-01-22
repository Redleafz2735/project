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
    // cart
    public function fetchdatacart($cart_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM cart WHERE cart.cart_id = '$cart_id'");
        return $result;
    }

    public function updatecartleafz($cart_id, $user_id, $item_id, $itemqty) {
        $result = mysqli_query($this->db->con, "UPDATE cart SET 
            user_id = '$user_id',
            item_id = '$item_id',
            itemqty = '$itemqty'
            WHERE cart_id = '$cart_id'
        ");
        return $result;
    }

    public function OrderUser($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime FROM orders
        INNER JOIN users ON orders.user_id = users.user_id
        WHERE orders.user_id = '$user_id'");
        return $result;
    }

    public function OrderUserdetails($order_id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_details.id, product.item_name, order_details.item_price, order_details.quantity FROM order_details
        INNER JOIN product ON order_details.item_id = product.item_id
        WHERE order_details.order_id = '$order_id'");
        return $result;
    }

    public function insertmadeOrder($uuid, $made_price, $user_id, $made_type, $status) {
        $reg = mysqli_query($this->db->con, "INSERT INTO made_order(made_id, made_price, user_id, made_type, status) VALUES('$uuid', '$made_price', '$user_id', '$made_type', '$status')");
        return $reg;
    }

    public function insertmadeOrderdetails($uuid, $size, $equidment, $color, $details) {
        $reg = mysqli_query($this->db->con, "INSERT INTO made_order_details(made_id, size, equidment, color, details) VALUES('$uuid', '$size', '$equidment', '$color', '$details')");
        
    }

    public function madeOrderUser($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_order.made_id, users.fullname, producttype.productbrand, made_order.made_price, made_order.status FROM made_order
        INNER JOIN users ON made_order.user_id = users.user_id
        INNER JOIN producttype ON made_order.made_type = producttype.producttype_id
        WHERE made_order.user_id = '$user_id'");
        return $result;
    }

    public function madeOrderUserdetails($made_id) {
        $result = mysqli_query($this->db->con,
        "SELECT producttype.productbrand, made_order_details.size, made_order_details.equidment, made_order_details.color, made_order_details.details FROM made_order_details
        INNER JOIN made_order ON made_order_details.made_id = made_order.made_id 
        INNER JOIN producttype ON made_order.made_type = producttype.producttype_id
        WHERE made_order_details.made_id = '$made_id'");
        return $result;
    }
}