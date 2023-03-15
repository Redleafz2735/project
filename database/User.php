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
    // NULL 
    public function OrderUser($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id = '$user_id' AND orders.status = 'NULL'
        ORDER BY orders.datetime DESC");
        return $result;
    }

    // IN PROCESSC
    public function OrderUser1($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id = '$user_id' AND orders.status = 'in process'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // Success
    public function OrderUser2($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id = '$user_id' AND orders.status = 'success'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // finish
    public function OrderUser5($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id = '$user_id' AND orders.status = 'finish'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // rejected
    public function OrderUser3($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id = '$user_id' AND orders.status = 'rejected'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // request
    public function OrderUser4($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime, order_request.r_status, order_request.details
        FROM orders
        INNER JOIN order_request ON orders.order_id = order_request.order_id
        INNER JOIN users ON orders.user_id = users.user_id
        WHERE orders.user_id = '$user_id' AND orders.status = 'in process' AND order_request.r_status = 'request'
        ORDER BY orders.datetime DESC");
        return $result;
    }

    public function OrderUserdetails($order_id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_details.id, product.item_name, order_details.item_price, order_details.quantity, orders.status FROM order_details
        INNER JOIN orders ON order_details.order_id = orders.order_id
        INNER JOIN product ON order_details.item_id = product.item_id
        WHERE order_details.order_id = '$order_id'");
        return $result;
    }
    //made Orders
    // NULL 
    public function madeOrderUser($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'NULL'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // Acept
    public function madeOrderUser1($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'Acept'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // IN PROCESSC
    public function madeOrderUser2($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'in process'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // finish
    public function madeOrderUser3($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'finish'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // Success
    public function madeOrderUser4($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'success'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // rejected
    public function madeOrderUser5($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'rejected'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    // request
    public function madeOrderUser6($user_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status, made_request.m_status FROM made_orders
		INNER JOIN made_request ON made_orders.made_id = made_request.made_id
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id = '$user_id' AND made_orders.status = 'in process' AND made_request.m_status = 'request'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }

    public function madeOrderUserhaed($made_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, blueprint.name, made_orders.color, made_orders.made_qty,
        made_orders.made_price, made_orders.width, made_orders.height
        FROM made_orders
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.made_id  = '$made_id'");
        return $result;
    }

    public function madeOrderUserdetails($made_id) {
        $result = mysqli_query($this->db->con,
        "SELECT made_order_details.id, made_order_details.made_id, made_order_details.item_id, product.item_image, product.item_name, made_order_details.MD_price, made_order_details.MD_Qty, made_orders.status FROM made_order_details 
        INNER JOIN made_orders ON made_order_details.made_id = made_orders.made_id 
        INNER JOIN product ON made_order_details.item_id = product.item_id 
        WHERE made_order_details.made_id = '$made_id'");
        return $result;
    }

    public function insertrequestorder($order_id, $status, $details) {
        $reg = mysqli_query($this->db->con, "INSERT INTO order_request(order_id, r_status, details) VALUES('$order_id', '$status', '$details')");
        return $reg;
    }

    public function insertrequestmadeorder($made_id, $status, $details) {
        $reg = mysqli_query($this->db->con, "INSERT INTO made_request(made_id, m_status, m_details) VALUES('$made_id', '$status', '$details')");
        return $reg;
    }

    public function fetblueprint() {
        $result = mysqli_query($this->db->con, "SELECT * FROM blueprint
        ORDER BY blueprint.id asc");
        return $result;
    }

    public function fetblueprint1($blue_id) {
        $result = mysqli_query($this->db->con, "SELECT blueprint.blue_id, blueprint.name, blueprint_material.M_Qty FROM blueprint
		INNER JOIN blueprint_material ON blueprint.blue_id = blueprint_material.blue_id
        WHERE blueprint.blue_id = '$blue_id'
        ORDER BY blueprint.id asc");
        return $result;
    }

    public function fetblueprintmaterail($blue_id) {
        $result = mysqli_query($this->db->con, "SELECT blueprint.blue_id,product.item_name,product.item_price,product.item_image,blueprint_material.M_Qty
        FROM blueprint_material
        INNER JOIN blueprint ON blueprint_material.blue_id = blueprint.blue_id
        INNER JOIN product ON blueprint_material.item_id = product.item_id
        WHERE blueprint.blue_id = '$blue_id'");
        return $result;
    }

    public function fetblueprintmaterailsend($blue_id) {
        $result = mysqli_query($this->db->con, "SELECT blueprint.blue_id,product.item_id,product.item_name,product.item_image,blueprint_material.M_Qty,
        product.item_price
        FROM blueprint_material
        INNER JOIN blueprint ON blueprint_material.blue_id = blueprint.blue_id
        INNER JOIN product ON blueprint_material.item_id = product.item_id
        WHERE blueprint.blue_id = '$blue_id'");
        return $result;
    }

    public function insertmadeOrder($made_id, $blue_id, $user_id, $color, $made_price, $width, $height, $status, $made_qty) {
        $reg = mysqli_query($this->db->con, "INSERT INTO made_orders(made_id, blue_id, user_id, color, made_price, width, height, status, made_qty) VALUES('$made_id', '$blue_id', '$user_id', '$color', '$made_price', '$width', '$height', '$status', '$made_qty')");
        return $reg;
    }

    public function insertmadeOrderdetails($made_id, $blue_id, $item_id, $price, $MD_Qty) {
        $reg = mysqli_query($this->db->con, "INSERT INTO made_order_details(made_id, blue_id, item_id, MD_price, MD_Qty) VALUES('$made_id', '$blue_id', '$item_id', '$price', '$MD_Qty')");
        
    }
}