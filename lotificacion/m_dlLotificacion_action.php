<?php
require("../conexion/conexion.php");
$id = $_POST["EliminarID"];
$error = 0;

$sql = "DELETE FROM lotificacion WHERE LOTIFICACION_ID = $id";

if ($conn->query($sql) === TRUE) {
    $error = 0;
} else {
    $error = 1;
}

$conn->close();
header("Location: v_dlLotificacion?r=".$error);

?>