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
        "SELECT order_details.id,order_details.order_id,users.fullname,product.item_name,product.item_price,users.address,order_details.quantity,order_details.status FROM order_details
        INNER JOIN orders ON order_details.order_id = orders.order_id 
        INNER JOIN product ON order_details.item_id = product.item_id
        INNER JOIN users ON order_details.user_id = users.user_id
        WHERE order_details.id");
        return $result;
    }

    public function Orderinnerjoinza($id) {
        $result = mysqli_query($this->db->con,
        "SELECT order_details.id,order_details.order_id,users.fullname,product.item_name,product.item_price,users.address,order_details.quantity,order_details.status FROM order_details
        INNER JOIN orders ON order_details.order_id = orders.order_id 
        INNER JOIN product ON order_details.item_id = product.item_id
        INNER JOIN users ON order_details.user_id = users.user_id
        WHERE order_details.id = '$id' ");
        return $result;
    }
}

?>