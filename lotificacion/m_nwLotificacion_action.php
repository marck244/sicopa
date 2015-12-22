<?php
require("../conexion/conexion.php");

$nombreL = $_POST["nombre"];
$numL = $_POST["numero"];
$precioL = $_POST["precio"];
$error = 0;
$sql = "INSERT INTO lotificacion(LOTIFICACION_NOMBRE, LOTIFICACION_NLOTE, LOTIFICACION_PRECIO) VALUES ('$nombreL','$numL','$precioL')";

if ($conn->query($sql) === TRUE) {
    $error = 0;
} else {
    $error = 1;
}
$conn->close();
header("Location: v_nwLotificacion?r=".$error);
?>