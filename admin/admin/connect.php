<?php
//include_once($_SERVER['DOCUMENT_ROOT'].'/git/web/remoroboinclude/globals.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname="";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


?>
