<?php
/*conexion a la base*/
$servername = "localhost";
$username = "root";
<<<<<<< HEAD
$password = "root";
$dbname = "db_sicopa_produccion";
=======
$password = "";
$dbname = "db_sicopa_desa";
>>>>>>> origin/master


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






?>