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



// CONEXION POR METODOS UTIL PARA EL FUNCIONAMIENTO DE DEPARTAMENTOS Y MUNICIPIOS
function obtenerConexion() {
        $db = new mysqli('localhost', 'root', 'root', 'db_sicopa_desa');

        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }

        return $db; 
    }

?>