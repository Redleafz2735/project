<?php 

class Testorders
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function Orderinnerjoin() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime FROM orders 
        INNER JOIN users ON orders.user_id = users.user_id 
        ORDER BY orders.datetime ASC
        ");
        return $result;
    }

    public function Orderinnerjoinza($order_id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_details.id, product.item_name, order_details.item_price, order_details.quantity, orders.status FROM order_details
        INNER JOIN orders ON order_details.order_id = orders.order_id
        INNER JOIN product ON order_details.item_id = product.item_id
        WHERE order_details.order_id = '$order_id'");
        return $result;
    }

    public function updateProductqty($item_id, $new_qty) {
        $result = mysqli_query($this->db->con, "UPDATE product SET 
            item_qty = '$new_qty'
            WHERE item_id = '$item_id'
        ");
    }

    public function fetchdataproduct($item_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM product WHERE product.item_id='$item_id' LIMIT 1");
        return $result;
    }

    public function deleteallcart() {
        $result = mysqli_query($this->db->con, "TRUNCATE TABLE cart");
        return $result;
    }

    public function madeOrderinnerjoin() {
        $result = mysqli_query($this->db->con,
        "SELECT made_order.made_id, users.fullname, producttype.productbrand, made_order.made_price, made_order.status FROM made_order
        INNER JOIN users ON made_order.user_id = users.user_id
        INNER JOIN producttype ON made_order.made_type = producttype.producttype_id");
        return $result;
    }

    public function madeOrderinnerjoinza($made_id) {
        $result = mysqli_query($this->db->con,
        "SELECT producttype.productbrand, made_order_details.size, made_order_details.equidment, made_order_details.color, made_order_details.details FROM made_order_details
        INNER JOIN made_order ON made_order_details.made_id = made_order.made_id 
        INNER JOIN producttype ON made_order.made_type = producttype.producttype_id
        WHERE made_order_details.made_id = '$made_id'");
        return $result;
    }
}

?>