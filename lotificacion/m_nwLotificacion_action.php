<?php
require("../conexion/conexion.php");

$nombreL = $_POST["nombre"];
$numL = $_POST["numero"];
$precioL = $_POST["precio"];
$error = 0;
$sql = "INSERT INTO lotificacion(LOTIFICACION_NOMBRE, LOTIFICACION_NLOTE, LOTIFICACION_PRECIO) VALUES ('$nombreL','$numL','$precioL')";

if ($conn->query($sql) === TRUE) {
    $error = 0;

//***********************************************************
$fechabitacora=date("Y-m-d H:i:s");
$sqlBitacora = "INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('".$_SESSION["loginUser-name"]."','$fechabitacora','Agrego nueva Lotificacion $nombreL en $precioL','LOTIFICACION','NUEVO')";
if ($conn->query($sqlBitacora) === TRUE) {
    echo "New record created successfully";
}//**********************************************************

} else {
    $error = 1;
}
$conn->close();
header("Location: v_nwLotificacion?r=".$error);
?>