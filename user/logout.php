<?php
session_start();
session_destroy();
require("../conexion/conexion.php");
 //***********************************************************
$fechabitacora=date("Y-m-d H:i:s");
$sqlBitacora = "INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('".$_SESSION["loginUser-name"]."','$fechabitacora','Fin de Session SICOPA','FIN de Sesion','SALIR')";
if ($conn->query($sqlBitacora) === TRUE) {
    echo "New record created successfully";
    $conn->close();
header("Location: ../");
}//**********************************************************

?>