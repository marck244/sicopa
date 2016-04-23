<?php
require("../conexion/conexion.php");
$id = $_POST["EliminarID"];
$error = 0;

$sql = "DELETE FROM lotificacion WHERE LOTIFICACION_ID = $id";

if ($conn->query($sql) === TRUE) {
    $error = 0;

//***********************************************************
$fechabitacora=date("Y-m-d H:i:s");
$sqlBitacora = "INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('".$_SESSION["loginUser-name"]."','$fechabitacora','Elimino la Lotificacion con ID $id','LOTIFICACION','ELIMINAR')";
if ($conn->query($sqlBitacora) === TRUE) {
    echo "New record created successfully";
}//**********************************************************


} else {
    $error = 1;
}

$conn->close();
header("Location: v_dlLotificacion?r=".$error);

?>