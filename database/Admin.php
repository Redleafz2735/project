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

    public function fetchdatamaterial_caculate_type() {
        $result = mysqli_query($this->db->con, "SELECT * FROM material_caculate_type");
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

    public function fetchonerecordmaterial_caculate_type($id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM material_caculate_type WHERE id = '$id'");
        return $result;
    }

    public function updatematerial_caculate_type($id, $Value) {
        $result = mysqli_query($this->db->con, "UPDATE material_caculate_type SET 
            Value = '$Value'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function Insertproducttype($productbrand) {
        $reg = mysqli_query($this->db->con, "INSERT INTO producttype(productbrand) VALUES('$productbrand')");
        return $reg;
    }

    public function Insertmaterial_caculate_type($Value) {
        $reg = mysqli_query($this->db->con, "INSERT INTO material_caculate_type(Value) VALUES('$Value')");
        return $reg;
    }

    public function Insertblueprint($blue_id, $name) {
        $reg = mysqli_query($this->db->con, "INSERT INTO blueprint(blue_id,name) VALUES('$blue_id','$name')");
        return $reg;
    }

    public function Insertblueprintdetails($blue_id, $item_id, $M_Qty, $type_id) {
        $reg = mysqli_query($this->db->con, "INSERT INTO blueprint_material(blue_id,item_id,M_Qty,type_id) VALUES('$blue_id','$item_id','$M_Qty','$type_id')");
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
        $signinquery = mysqli_query($this->db->con, "SELECT admin_id, A_fullname FROM admins WHERE username = '$username' AND password = '$password'");
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

    public function updatemadeOrders1($made_id, $made_price, $status) {
        $result = mysqli_query($this->db->con, "UPDATE made_orders SET
            made_price = '$made_price',
            status = '$status'
            WHERE made_id = '$made_id'
        ");
        return $result;
    }

    public function updateadminOrders($adminorders_id, $status) {
        $result = mysqli_query($this->db->con, "UPDATE adminorders SET 
            admin_status = '$status'
            WHERE adminorders_id = '$adminorders_id'
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
        ORDER BY orders.datetime DESC");
        return $result;
    }

    // IN PROCESSC
    public function OrderAdmin1() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'in process'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // Success
    public function OrderAdmin2() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'success'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // รอรับหน้าร้าน
    public function OrderAdmin5() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'finish'
        ORDER BY orders.datetime DESC");
        return $result;
    }
    // rejected
    public function OrderAdmin3() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.order_id, orders.user_id, users.fullname, orders.subtotal, orders.status, orders.datetime 
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id 
        WHERE orders.user_id AND orders.status = 'rejected'
        ORDER BY orders.datetime DESC");
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
        ORDER BY orders.datetime DESC");
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
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'NULL'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //Acept
    public function madeOrderUser1() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'Acept'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //in process
    public function madeOrderUser2() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'in process'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //finish
    public function madeOrderUser3() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'finish'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //success
    public function madeOrderUser4() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'success'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //rejected
    public function madeOrderUser5() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status FROM made_orders
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'rejected'
        ORDER BY made_orders.datetime DESC");
        return $result;
    }
    //request
    public function madeOrderUser6() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.made_id, users.fullname, blueprint.name, made_orders.color, made_orders.made_qty, made_orders.made_price, made_orders.width, made_orders.height, made_orders.datetime, made_orders.status, made_request.m_status FROM made_orders
		INNER JOIN made_request ON made_orders.made_id = made_request.made_id
        INNER JOIN users ON made_orders.user_id = users.user_id
        INNER JOIN blueprint ON made_orders.blue_id = blueprint.blue_id
        WHERE made_orders.user_id AND made_orders.status = 'in process' AND made_request.m_status = 'request'
        ORDER BY made_orders.datetime DESC");
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

    public function companydetails($company_id) {
        $result = mysqli_query($this->db->con,"SELECT company.company_id, company.company_name, product.item_id, product.item_name, product.item_price, product.item_image FROM companydetails
        INNER JOIN company ON company.company_id = companydetails.company_id
        INNER JOIN product ON product.item_id = companydetails.item_id
        WHERE company.company_id = '$company_id'");
        return $result;
    }

    public function admincart($admin_id, $company_id, $item_id, $item_qty, $trueprice, $colors, $size) {
        $result = mysqli_query($this->db->con,"INSERT INTO admincart(admin_id, company_id, item_id, A_qty, A_price, A_colors, A_size) 
        VALUES('$admin_id', '$company_id', '$item_id', '$item_qty', '$trueprice', '$colors', '$size')");
        return $result;
    }

    public function admincartfetch($company_id) {
        $result = mysqli_query($this->db->con,"SELECT admincart.A_id, admincart.admin_id, admincart.company_id, admincart.item_id, product.item_image, company.company_name, product.item_name, admincart.A_colors, product_colors.colors, admincart.A_size, product_size.size, admincart.A_qty, admincart.A_price FROM admincart
        INNER JOIN product_size ON product_size.id = admincart.A_size
        INNER JOIN product_colors ON product_colors.id = admincart.A_colors
        INNER JOIN company ON company.company_id = admincart.company_id
        INNER JOIN product ON product.item_id = admincart.item_id
        WHERE admincart.company_id = '$company_id'"
        );
        return $result;
    }

    public function adminInsertOrders($uuid, $admin_id, $total, $status) {
        $result = mysqli_query($this->db->con,"INSERT INTO adminorders(adminorders_id, admintotal, admin_id, admin_status) 
        VALUES('$uuid', '$total', '$admin_id', '$status')");
        return $result;
    }

    public function adminInsertOrdersdetails($uuid, $item_id, $Admin_price, $Admin_Qty, $company_id) {
        $result = mysqli_query($this->db->con,"INSERT INTO adminorders_details(adminorders_id, item_id, Admin_price, Admin_Qty, company_id) 
        VALUES('$uuid', '$item_id', '$Admin_price', '$Admin_Qty', '$company_id')");
    }

    public function deletealladmincart() {
        $result = mysqli_query($this->db->con, "TRUNCATE TABLE admincart");
        return $result;
    }
    //NULL
    public function Adminorder() {
        $result = mysqli_query($this->db->con,
        "SELECT adminorders.adminorders_id, admins.A_fullname, adminorders.admintotal, adminorders.admin_status, adminorders.admin_datetime
        FROM adminorders
        INNER JOIN admins ON admins.admin_id = adminorders.admin_id 
        WHERE admins.admin_id AND adminorders.admin_status = 'NULL'
        ORDER BY adminorders.admin_datetime ASC");
        return $result;
    }
    //in process
    public function Adminorder1() {
        $result = mysqli_query($this->db->con,
        "SELECT adminorders.adminorders_id, admins.A_fullname, adminorders.admintotal, adminorders.admin_status, adminorders.admin_datetime
        FROM adminorders
        INNER JOIN admins ON admins.admin_id = adminorders.admin_id 
        WHERE admins.admin_id AND adminorders.admin_status = 'in process'
        ORDER BY adminorders.admin_datetime ASC");
        return $result;
    }
    //success
    public function Adminorder2() {
        $result = mysqli_query($this->db->con,
        "SELECT adminorders.adminorders_id, admins.A_fullname, adminorders.admintotal, adminorders.admin_status, adminorders.admin_datetime
        FROM adminorders
        INNER JOIN admins ON admins.admin_id = adminorders.admin_id 
        WHERE admins.admin_id AND adminorders.admin_status = 'success'
        ORDER BY adminorders.admin_datetime ASC");
        return $result;
    }
    //rejected
    public function Adminorder3() {
        $result = mysqli_query($this->db->con,
        "SELECT adminorders.adminorders_id, admins.A_fullname, adminorders.admintotal, adminorders.admin_status, adminorders.admin_datetime
        FROM adminorders
        INNER JOIN admins ON admins.admin_id = adminorders.admin_id 
        WHERE admins.admin_id AND adminorders.admin_status = 'rejected'
        ORDER BY adminorders.admin_datetime ASC");
        return $result;
    }

    public function NumUser() {
        $result = mysqli_query($this->db->con,
        "SELECT users.user_id FROM users ORDER BY users.user_id ASC");
        return $result;
    }

    public function Numproduct() {
        $result = mysqli_query($this->db->con,
        "SELECT product.item_id FROM product ORDER BY product.item_id ASC");
        return $result;
    }

    public function NumOrders() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.status FROM orders WHERE orders.status = 'NULL'");
        return $result;
    }

    public function NummadeOrders() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.status FROM made_orders WHERE made_orders.status = 'NULL'");
        return $result;
    }

    public function Numcompany() {
        $result = mysqli_query($this->db->con,
        "SELECT company.company_id FROM company ORDER BY company.company_id ASC");
        return $result;
    }

    public function Editqty($A_id) {
        $result = mysqli_query($this->db->con,
        "SELECT admincart.A_id, admincart.company_id, admincart.A_qty, product.item_price FROM admincart
        INNER JOIN product ON admincart.item_id = product.item_id
        WHERE admincart.A_id  = '$A_id'");
        return $result;
    }

    public function updateadmincartleafz($A_id, $A_qty, $price) {
        $result = mysqli_query($this->db->con, "UPDATE admincart SET 
            A_qty = '$A_qty',
            A_price = '$price'
            WHERE A_id = '$A_id'
        ");
        return $result;
    }

    public function Numcatagory() {
        $result = mysqli_query($this->db->con,
        "SELECT producttype.producttype_id FROM producttype ORDER BY producttype.producttype_id ASC");
        return $result;
    }

    public function NumOrders1() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.status FROM orders WHERE orders.status = 'in process'");
        return $result;
    }

    public function NummadeOrders1() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.status FROM made_orders WHERE made_orders.status = 'in process'");
        return $result;
    }

    public function Countallorders() {
        $result = mysqli_query($this->db->con,
        "SELECT product.item_name, SUM(order_details.quantity) AS quantity FROM order_details
        INNER JOIN product ON order_details.item_id = product.item_id
        GROUP BY product.item_name");
        return $result;
    }

    public function NumOrders2() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.status FROM orders WHERE orders.status = 'success'");
        return $result;
    }

    public function NummadeOrders2() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.status FROM made_orders WHERE made_orders.status = 'success'");
        return $result;
    }

    public function NumOrders3() {
        $result = mysqli_query($this->db->con,
        "SELECT orders.status FROM orders WHERE orders.status = 'rejected'");
        return $result;
    }

    public function NummadeOrders3() {
        $result = mysqli_query($this->db->con,
        "SELECT made_orders.status FROM made_orders WHERE made_orders.status = 'rejected'");
        return $result;
    }

    public function Countalladminorders() {
        $result = mysqli_query($this->db->con,
        "SELECT product.item_name, SUM(adminorders_details.Admin_Qty) AS adminquantity FROM adminorders_details
        INNER JOIN product ON adminorders_details.item_id = product.item_id
        GROUP BY product.item_name");
        return $result;
    }

    public function fetchdatablueprint() {
        $result = mysqli_query($this->db->con, "SELECT * FROM blueprint");
        return $result;
    }

    public function fetchdatablueprint1($blue_id) {
        $result = mysqli_query($this->db->con, "SELECT * FROM blueprint
        WHERE blueprint.blue_id = '$blue_id'");
        return $result;
    }

    public function fetchdataadminblueprint_matrial($blue_id) {
        $result = mysqli_query($this->db->con, "SELECT blueprint_material.id, blueprint_material.blue_id, blueprint_material.item_id, 
        product.item_name, product.item_image, blueprint_material.M_Qty, material_caculate_type.Value FROM blueprint_material
        INNER JOIN material_caculate_type ON blueprint_material.type_id = material_caculate_type.id
        INNER JOIN product ON blueprint_material.item_id = product.item_id
        WHERE blueprint_material.blue_id   = '$blue_id'");
        return $result;
    }

    public function fetchdataadminblueprint_matrial1($id) {
        $result = mysqli_query($this->db->con, "SELECT blueprint_material.id, blueprint_material.blue_id, blueprint_material.item_id, 
        product.item_name, product.item_image, blueprint_material.M_Qty, blueprint_material.type_id FROM blueprint_material
        INNER JOIN product ON blueprint_material.item_id = product.item_id
        WHERE blueprint_material.id  = '$id'");
        return $result;
    }

    public function fetchdataproductforblueprint() {
        $result = mysqli_query($this->db->con, "SELECT product.item_id, product.item_brand, product.item_name FROM product
        WHERE product.item_brand = '5'");
        return $result;
    }

    public function fetmaterial_caculate_type() {
        $result = mysqli_query($this->db->con, "SELECT * FROM material_caculate_type
        ORDER BY material_caculate_type.id asc");
        return $result;
    }

    public function updateadminblueprint_matrial($id, $MD_Qty, $type_id) {
        $result = mysqli_query($this->db->con, "UPDATE blueprint_material SET 
            M_Qty = '$MD_Qty',
            type_id = '$type_id'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function watchOrdersreport($form_date, $to_date) {
        $result = mysqli_query($this->db->con, "SELECT product.item_name, order_details.item_price, order_details.quantity, orders.datetime,
        SUM(order_details.quantity) AS quantity
            FROM order_details
                INNER JOIN product ON order_details.item_id = product.item_id
                INNER JOIN orders ON order_details.order_id = orders.order_id
                WHERE orders.datetime BETWEEN '$form_date' AND '$to_date'
                GROUP BY product.item_name
        ");
        return $result;
    }

    public function watchmadeOrdersreport($form_date, $to_date) {
        $result = mysqli_query($this->db->con, "SELECT product.item_name, made_order_details.MD_price, made_order_details.MD_Qty, made_orders.datetime,
        SUM(made_order_details.MD_Qty) AS quantity
        FROM made_order_details
        INNER JOIN product ON made_order_details.item_id = product.item_id
        INNER JOIN made_orders ON made_order_details.made_id = made_orders.made_id
        WHERE made_orders.datetime BETWEEN '$form_date' AND '$to_date'
        GROUP BY product.item_name
        ");
        return $result;
    }

    public function fetpriceadmin($item_id, $colors, $size) {
        $result = mysqli_query($this->db->con, "SELECT product_details.item_id, product_details.colors_id, product_details.size_id, product_details.price, product_details.item_qty FROM product_details 
        WHERE item_id = '$item_id' AND product_details.colors_id = '$colors' AND product_details.size_id = '$size'
        ");
        return $result;
    }
}   

