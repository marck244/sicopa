<?php

require("../conexion/conexion.php");

$newId = "";
$sql = "SELECT MAX(LOTIFICACION_ID) FROM lotificacion";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$newId = $row["MAX(LOTIFICACION_ID)"]+1;
	}
}

$conn->close();

?>