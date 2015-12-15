<?php
$lotificacion = $_GET["loti"];
echo "<tr>
       <th>Codigo</th>
       <th>Nombre Lotificacion</th>
       <th>Numero de Lotes</th>      
       <th>Precio de Lotificacion</th>
       <th>Eliminar</th>
     </tr>";
if ($lotificacion=="" || $lotificacion==NULL) {
	# code...
	echo "<tr><td colspan='5'>Escriba un nombre de Lotificacion</td></tr>";
}else{
	require("../conexion/conexion.php");
	$q = "SELECT LOTIFICACION_ID, LOTIFICACION_NOMBRE, LOTIFICACION_NLOTE, LOTIFICACION_PRECIO FROM lotificacion WHERE LOTIFICACION_NOMBRE LIKE '%$lotificacion%'";
	$result = $conn->query($q);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

			echo "<tr>
			<td><input type='hidden' id='cod".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_ID"]."'>".$row["LOTIFICACION_ID"]."</td>
			<td><input type='hidden' id='nom".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_NOMBRE"]."'>".$row["LOTIFICACION_NOMBRE"]."</td>
			<td><input type='hidden' id='num".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_NLOTE"]."'>".$row["LOTIFICACION_NLOTE"]."</td>
			<td><input type='hidden' id='pre".$row["LOTIFICACION_ID"]."' value='".$row["LOTIFICACION_PRECIO"]."'>$ ".$row["LOTIFICACION_PRECIO"]." </td>
			<td><a href='#' class='glyphicon glyphicon-trash' onclick='abrirModalDelete(".$row["LOTIFICACION_ID"].")'></a></td>
			</tr>";
			
		}
	} else {
		echo "<tr><td colspan='5'>No hay coincidencias</td></tr>";
	}
	$conn->close();
	//onclick='formUpdate(".$row["LOTIFICACION_ID"].")
}
?>
