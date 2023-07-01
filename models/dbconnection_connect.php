<?php
$servername = "localhost";
$username_database = "root";
$password_database = "";
$dbname = "mvc_php_database";

$conn = new mysqli($servername, $username_database, $password_database);

if($conn->connect_error){
    die("Connection failed : ".$conn->connect_error);
}

if(!$conn->select_db($dbname)){
    die("Connection failed : ".$conn->connect_error);
}

?>