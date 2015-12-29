<?php

$id = $_GET["dui"];
if (is_numeric($id)) {
	$id = $id;
}else{
	if($id=="" || $id==NULL){
	}else{
	$id_ex = explode("-", $id);
	$id = $id_ex[0].$id_ex[1];
    }
}

if ($id=="" || $id==NULL) {
	echo "<li><a href=''> Escriba DUI de un cliente </a></li>";
}else{
	require("../conexion/conexion.php");
	$q = "SELECT CLIENTE_ID, CLIENTE_NOMBRE, CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID LIKE '%$id%' ";
	$result = $conn->query($q);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$dui_mask = str_split($row["CLIENTE_ID"]);
			$iddui = $dui_mask[0].$dui_mask[1].$dui_mask[2].$dui_mask[3].$dui_mask[4].$dui_mask[5].$dui_mask[6].$dui_mask[7]."-".$dui_mask[8];
			echo "<li>
			<button class='btn btn-link' type='button' value='".$iddui."' id='".$iddui."' onclick='panelPagos(this.value)')> DUI: <strong>".$iddui."</strong> Nombre: <strong>".$row["CLIENTE_NOMBRE"]." ".$row["CLIENTE_APELLIDO"]."</strong></button><input type='hidden' id='clientenombre".$row["CLIENTE_ID"]."' value='".$row["CLIENTE_NOMBRE"]." ".$row["CLIENTE_APELLIDO"]."'></li>";
		}
	} else {
		echo "<li><a> No hay coicidencias </a></li>";
	}

	$conn->close();

}

?>