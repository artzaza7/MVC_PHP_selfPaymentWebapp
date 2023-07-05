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

    public static function hasUserById($id)
    {
        require("dbconnection_connect.php");
        $sql = "SELECT COUNT(*) FROM user WHERE user.id ='" . $id . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        require("dbconnection_close.php");

        $count = $row['COUNT(*)'];
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }
    public static function hasUserByUsername($username)
    {
        require("dbconnection_connect.php");
        $sql = "SELECT COUNT(*) FROM user WHERE user.username ='" . $username . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        require("dbconnection_close.php");

        $count = $row['COUNT(*)'];
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }
    public static function getUserByUsername($username)
    {
        require("dbconnection_connect.php");
        $sql = "SELECT * FROM user WHERE user.username ='" . $username . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        require("dbconnection_close.php");

        $rowId = $row['id'];
        $rowUsername = $row['username'];
        $rowPassword = $row['password'];

        return new User($rowId, $rowUsername, $rowPassword);
    }
    //Create USER INTO Database
    public static function create($username, $password)
    {
        require("dbconnection_connect.php");
        //Secure Password Using bcrypt
        //cost (int) - which denotes the algorithmic cost that should be used. Examples of these values can be found on the crypt() page.
        //กำหนด cost 10 เพื่อให้การเข้ารหัสรวดเร็วยิ่งขึ้น *ตัวเลขยิ่งเยอะ ยิ่งทำงานช้า ซึ่งขึ้นอยู่กับความเร็วของคอมที่เราใช้ครับ เพราะฉะนั้น 10 ก็พอครับ หรือจะลองเพิ่มตัวเลขแล้วรันดูครับ ว่าจะดีเลเยอะไหม!!
        $options = [
            'cost' => 10,
        ];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);

        $sql = "INSERT INTO user (username, password) values ('$username', '$passwordHash')";
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
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }
}