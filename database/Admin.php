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

}