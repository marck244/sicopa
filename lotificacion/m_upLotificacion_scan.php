<?php
$lotificacion = $_GET["loti"];

if ($lotificacion=="" || $lotificacion==NULL) {
	# code...
	echo "<li><a href=''>Escriba un nombre de Lotificacion</a></li>";
}else{
	require("../conexion/conexion.php");
	$q = "SELECT LOTIFICACION_ID, LOTIFICACION_NOMBRE, LOTIFICACION_NLOTE, LOTIFICACION_PRECIO FROM lotificacion WHERE LOTIFICACION_NOMBRE LIKE '%$lotificacion%' LIMIT 5";
	$result = $conn->query($q);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<li><button class='btn btn-link' type='button' value='".$row["LOTIFICACION_ID"]."' id='".$row["LOTIFICACION_ID"]."' onclick='formUpdate(this.value)')><strong>".$row["LOTIFICACION_NOMBRE"]."</strong></button><input type='hidden' id='nom".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_NOMBRE"]."'><input type='hidden' id='num".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_NLOTE"]."'>
			<input type='hidden' id='pre".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_PRECIO"]."'></li>";
			//echo "<li><a href='' '>ID: <strong>".$row["LOTIFICACION_ID"]."</strong> Lotificacion: <strong>".$row["LOTIFICACION_NOMBRE"]."</strong></a></li>";
		}
	} else {
		echo "<li><a>No hay coicidencias</a></li>";
	}
	$conn->close();
	//onclick='formUpdate(".$row["LOTIFICACION_ID"].")
}
?>
