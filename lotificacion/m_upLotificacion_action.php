<?php
require("../conexion/conexion.php");

$idL = $_POST["textUpId"];
$nombreL = $_POST["textUpNombre"];
$numL = $_POST["textUpNumero"];
$precioL = $_POST["textUpPrecio"];
$error = 0;

$sql = "UPDATE lotificacion SET LOTIFICACION_NOMBRE='$nombreL', LOTIFICACION_NLOTE='$numL', LOTIFICACION_PRECIO='$precioL' WHERE LOTIFICACION_ID = $idL";

if ($conn->query($sql) === TRUE) {
    $error = 0;

//***********************************************************
$fechabitacora=date("Y-m-d H:i:s");
$sqlBitacora = "INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('".$_SESSION["loginUser-name"]."','$fechabitacora','Agrego nueva Lotificacion $nombreL en $precioL','LOTIFICACION','ACTUALIZAR')";
if ($conn->query($sqlBitacora) === TRUE) {
    echo "New record created successfully";
}//**********************************************************


} else {
    $error = 1;
}
$conn->close();
header("Location: v_upLotificacion?r=".$error);
?>
