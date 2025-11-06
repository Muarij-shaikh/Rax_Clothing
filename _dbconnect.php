<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce_muarij";
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn){
    die("sorry it was not connected" . mysqli_connect_error());

}

?>