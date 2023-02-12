<?php

// php Admin Product
class Admin
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

    public function fetchdataproducttype() {
        $result = mysqli_query($this->db->con, "SELECT * FROM producttype");
        return $result;
    }

    public function fetchonerecord($user_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM users WHERE user_id = '$user_id'");
        return $result;
    }

    public function fetchonerecordproducttype($producttype_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM producttype WHERE producttype_id = '$producttype_id'");
        return $result;
    }

    public function Insertproducttype($productbrand) {
        $reg = mysqli_query($this->db->con, "INSERT INTO producttype(productbrand) VALUES('$productbrand')");
        return $reg;
    }

    public function deleteproducttype($producttype_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM producttype WHERE producttype_id = '$producttype_id'");
        return $deleterecord;
    }

    public function deleteUser($user_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM users WHERE user_id = '$user_id'");
        return $deleterecord;
    }

    //adminregister
    public function registrationAdmin($fullname, $username, $password) {
        $reg = mysqli_query($this->db->con, "INSERT INTO admins(fullname, username, password) VALUES('$fullname','$username', '$password')");
        return $reg;
    }

    public function signinadmin($username, $password) {
        $signinquery = mysqli_query($this->db->con, "SELECT admin_id, fullname FROM admins WHERE username = '$username' AND password = '$password'");
        return $signinquery;
    }

    public function updatecatagory($producttype_id, $productbrand) {
        $result = mysqli_query($this->db->con, "UPDATE producttype SET 
            productbrand = '$productbrand'
            WHERE producttype_id = '$producttype_id'
        ");
        return $result;
    }

    public function updateOrderdetails($order_id, $status) {
        $result = mysqli_query($this->db->con, "UPDATE orders SET 
            status = '$status'
            WHERE order_id = '$order_id'
        ");
        return $result;
    }

    public function updatemadeOrderdetails($made_id, $status, $made_price) {
        $result = mysqli_query($this->db->con, "UPDATE made_order SET
            made_price = '$made_price', 
            status = '$status'
            WHERE made_id = '$made_id'
        ");
        return $result;
    }

    // NULL 
    public function OrderAdmin() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'NULL'
        ORDER BY orders.datetime ASC");
        return $result;
    }

    // IN PROCESSC
    public function OrderAdmin1() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'in process'
        ORDER BY orders.datetime ASC");
        return $result;
    }
    // Success
    public function OrderAdmin2() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'success'
        ORDER BY orders.datetime ASC");
        return $result;
    }
    // รอรับหน้าร้าน
    public function OrderAdmin5() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'finish'
        ORDER BY orders.datetime ASC");
        return $result;
    }
    // rejected
    public function OrderAdmin3() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'rejected'
        ORDER BY orders.datetime ASC");
        return $result;
    }
    // request
    public function OrderAdmin4() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime, order_request.r_status, order_request.details
        FROM orders
        INNER JOIN order_request ON orders.order_id = order_request.order_id
        INNER JOIN users ON orders.user_id = users.user_id
        WHERE orders.user_id AND orders.status = 'in process' AND order_request.r_status = 'request'
        ORDER BY orders.datetime ASC");
        return $result;
    }

    // ลบรีเควส
    public function deleteorderRequest($order_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM order_request WHERE order_id = '$order_id'");
        return $deleterecord;
    }

    public function OrderAdminrequest($order_id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_request.order_id, order_request.r_status, order_request.details FROM order_request
        WHERE order_request.order_id = '$order_id' AND order_request.r_status = 'request'");
        return $result;
    }
}