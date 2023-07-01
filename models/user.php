<?php
class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    //Create USER INTO Database
    public static function create($username, $password)
    {
        require("dbconnection_connect.php");
        $sql = "INSERT INTO user (username, password) values ('$username', '$password')";
        $result = $conn->query($sql);
        require("dbconnection_close.php");
        return "Create User Success";
    }
    // Checking duplicate username in database, already have username return true if not return false
    public static function duplicate($username)
    {
        require("dbconnection_connect.php");
        $sql = "SELECT COUNT(*) FROM user WHERE user.username = '" . $username . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        require("dbconnection_close.php");

        $count = $row['COUNT(*)'];
        echo "COUNT : " . $count;
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }
}
?>