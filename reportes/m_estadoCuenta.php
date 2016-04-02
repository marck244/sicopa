<?php
require("../conexion/conexion.php");
$cuenta = $_GET["cuenta"];
echo "<h4>Cuenta: $cuenta &nbsp;&nbsp;<span class='glyphicon glyphicon-tree-conifer'></span> <strong>Esparta</strong> &nbsp;&nbsp;<span class='glyphicon glyphicon-leaf'></span> <strong>E0083</strong></h4>";
echo "<table class='table table-hover text-center'>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Fecha Pago</th>";
echo "<th>C.C</th>";
echo "<th>C.Interes</th>";
echo "<th>C.IVA</th>";
echo "<th>T. Cuota</th>";
echo "<th>Credito Pagado</th>";
echo "</tr>";

$sqltodo = "SELECT CUENTA_PAGOS_FECHA, CUENTA_PAGOS_CAPITAL, CUENTA_PAGOS_INTERES, CUENTA_PAGOS_IVA FROM cuenta_pagos WHERE CUENTA_ID ='".$cuenta."'";
$resultTodo = $conn->query($sqltodo);
$correlativo = 1;
$aux=0.00;
if ($resultTodo->num_rows > 0) {
    while($rowTodo = $resultTodo->fetch_assoc()) {
    	$fecha = date_create($rowTodo["CUENTA_PAGOS_FECHA"]);
    	$cuota = ($rowTodo["CUENTA_PAGOS_CAPITAL"]+$rowTodo["CUENTA_PAGOS_INTERES"]+$rowTodo["CUENTA_PAGOS_IVA"]);
    	$Total = ($cuota+$aux);
    	echo "<tr><td>$correlativo</td><td>".date_format($fecha,'d/m/Y g:i A')."</td><td>$rowTodo[CUENTA_PAGOS_CAPITAL]</td><td>$rowTodo[CUENTA_PAGOS_INTERES]</td><td>$rowTodo[CUENTA_PAGOS_IVA]</td><td> $ ".$cuota."</td><td>$ $Total </td></tr>";
    	$correlativo++;
    	$aux = $Total;
    }
}
echo "</table>";
 $conn->close();
?>