<?php
require("../conexion/conexion.php");
?>
<table class="table table-hover text-center">
	<tr>
		<th>DUI</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Cuenta</th>
		<th>Ultimo Pago</th>
		<th>Siguiente Pago</th>
		<th>Dias</th>
	</tr>
	<?php
	$sqlGlobal = "SELECT cliente.CLIENTE_ID, cliente.CLIENTE_NOMBRE, cliente.CLIENTE_APELLIDO, cuenta.CUENTA_ID FROM `cuenta` INNER JOIN cliente ON cuenta.CLIENTE_ID=cliente.CLIENTE_ID WHERE CUENTA_ESTADOS_ID=1;";
	$resultGlobal = $conn->query($sqlGlobal);
	if ($resultGlobal->num_rows > 0) {
	# code...
		while ($rowGlobal = $resultGlobal->fetch_assoc()) {
		# code...
			$sql = "SELECT MAX(CUENTA_PAGOS_FECHA) AS ULTIMOPAGO, date_add(MAX(CUENTA_PAGOS_FECHA), INTERVAL 1 MONTH) AS NEXT, DATEDIFF(NOW(),(SELECT MAX(CUENTA_PAGOS_FECHA) FROM cuenta_pagos WHERE CUENTA_ID='".$rowGlobal["CUENTA_ID"]."')) AS DIAS FROM cuenta_pagos WHERE CUENTA_ID='".$rowGlobal["CUENTA_ID"]."';";
			$result = $conn->query($sql);
if ($result->num_rows > 0) {//inicio de IF
    // output data of each row
    while($row = $result->fetch_assoc()) { //inicio de while
    	if ($row["DIAS"]>60) { // if 30

    		?>
    		<tr>
    			<td><?php echo $rowGlobal["CLIENTE_ID"];?></td>
    			<td><?php echo $rowGlobal["CLIENTE_NOMBRE"];?></td>
    			<td><?php echo $rowGlobal["CLIENTE_APELLIDO"];?></td>
    			<td><?php echo $rowGlobal["CUENTA_ID"];?></td>
    			<td><?php echo date_format((date_create($row["ULTIMOPAGO"])),'d/m/Y');?></td>
    			<td><?php echo date_format((date_create($row["NEXT"])),'d/m/Y');?></td>
    			<td><?php echo $row["DIAS"];?></td>
    		</tr>
    		<?php
    	}else{
    		echo "<td colspan='7'>Genial, No hay Cuentas en MORA !!!</td>";
    	} //if 30
    }//fin de while
} //fin de If
	} // WHILE GLOBAL
}
?>

</table>

<?php
$conn->close();
?>