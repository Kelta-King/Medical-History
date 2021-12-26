<?php

// Change data accordingly
$d_servername = "localhost";
$d_username = "root";
$d_password = "";
$d_name = "parients_records";

// Create connection
$conn = new mysqli($d_servername, $d_username, $d_password, $d_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>