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
    // ปรับสถานะ ออเดอร์
    public function updateOrderdetails($order_id, $status) {
        $result = mysqli_query($this->db->con, "UPDATE orders SET 
            status = '$status'
            WHERE order_id = '$order_id'
        ");
        return $result;
    }

    public function updatemadeOrders($made_id, $status) {
        $result = mysqli_query($this->db->con, "UPDATE made_orders SET 
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

    public function madeOrderAdminrequest($made_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_request.made_id, made_request.m_status, made_request.m_details FROM made_request
        WHERE made_request.made_id = '$made_id' AND made_request.m_status = 'request'");
        return $result;
    }

    //NULL
    public function madeOrderUser() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'NULL'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //Acept
    public function madeOrderUser1() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'Acept'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //in process
    public function madeOrderUser2() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'in process'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //finish
    public function madeOrderUser3() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'finish'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //success
    public function madeOrderUser4() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'success'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //rejected
    public function madeOrderUser5() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'rejected'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    //request
    public function madeOrderUser6() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.size, made_orders.details, made_orders.datetime, made_orders.status, made_request.m_status FROM made_orders
		INNER JOIN made_request ON made_orders.made_id = made_request.made_id
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'in process' AND made_request.m_status = 'request'
        ORDER BY made_orders.datetime ASC");
        return $result;
    }
    // ลบรีเควส สั่งทำ
    public function deletemadeorderRequest($made_id) {
        $deleterecord = mysqli_query($this->db->con, "DELETE FROM made_request WHERE made_id = '$made_id'");
        return $deleterecord;
    }
    
    public function madedetailadmin($id) {
        $result = mysqli_query($this->db->con,"SELECT made_order_details.id, made_order_details.made_id, product.item_image, product.item_name, made_order_details.MD_price, made_order_details.MD_Qty FROM made_order_details
        INNER JOIN product ON made_order_details.item_id = product.item_id
        WHERE made_order_details.id ='$id'");
        return $result;
    }

    public function updatemadeOrdersdetail($id, $MD_Qty, $MD_price) {
        $result = mysqli_query($this->db->con, "UPDATE made_order_details SET 
            MD_Qty = '$MD_Qty',
            MD_price = '$MD_price'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function company() {
        $result = mysqli_query($this->db->con,"SELECT company.company_id, company.company_name, company.company_image FROM company");
        return $result;
    }
}