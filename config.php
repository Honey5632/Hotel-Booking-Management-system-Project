<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_management";
$conn = mysqli_connect("localhost", "root", "", "hotel_management");
if($conn->connect_error){
    die("connect failed: ". $conn->connect_error);
}
?>