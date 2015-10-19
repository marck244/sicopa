<?php
/*conexion a la base*/
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_sicopa_desa";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>