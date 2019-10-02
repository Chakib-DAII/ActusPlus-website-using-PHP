<?php
$servername ="127.0.0.1" /*"192.168.137.1"*/; 
$username = "root";  
$password = "ch123";  
$dbname = "actus";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname,'3307');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>