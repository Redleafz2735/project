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
        INNER JOIN users ON orders.user_id = users.user_id");
        return $result;
    }

    public function Orderinnerjoinza($order_id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_details.id, product.item_name, order_details.item_price, order_details.quantity FROM order_details
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
}

?>