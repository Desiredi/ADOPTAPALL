<?php
$servername = "localhost";
$username = "root"; 
$password = "";  
$dbname = "adoptpal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn) {
//     echo "DB Connected Successfully";
// }

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
