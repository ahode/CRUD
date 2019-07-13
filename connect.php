<?php
// this connect To database
$hostname="localhost";
// database name    
$username="root"; 
// database password  
$password="casacasa";
// database name    
$dbname="crud";  

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("You Don't Connect With Me");
} 
?>
