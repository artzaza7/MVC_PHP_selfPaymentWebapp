<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "mvc_php_database";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("Connection failed : ".$conn->connect_error);
}

if(!$conn->select_db($dbname)){
    die("Connection failed : ".$conn->connect_error);
}

?>