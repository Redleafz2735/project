<?php

class RegisterLogin
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function usernameavailable($username) {
        $checkuser = mysqli_query($this->db->con, "SELECT username FROM users WHERE username = '$username'");
        return $checkuser;
    }

    public function registration($fullname, $address, $username, $password) {
        $reg = mysqli_query($this->db->con, "INSERT INTO users(fullname, address, username, password) VALUES('$fullname', '$address', '$username', '$password')");
        return $reg;
    }

    public function signin($username, $password) {
        $signinquery = mysqli_query($this->db->con, "SELECT user_id, fullname FROM users WHERE username = '$username' AND password = '$password'");
        return $signinquery;
    }
}

?>