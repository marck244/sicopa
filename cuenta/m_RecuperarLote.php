<?php  

	include("../conexion/conexion.php");

	$codigo_pagos=$_GET['id_pago'];
	$codigo_cuenta=$_GET['id_cuenta'];
	$lote=$_GET['lote'];



	$query=$conn->query("DELETE FROM cuenta_pagos WHERE CUENTA_PAGOS_ID='$codigo_pagos'");
	$query1=$conn->query("DELETE FROM cuenta WHERE CUENTA_ID='$codigo_cuenta'");
	$query2=$conn->query("UPDATE lote SET LOTE_ESTADO='LIBRE' WHERE LOTE_ID='$lote'");

	if ($query > 0 ) {
					header("location:v_EstadoCuentas.php?eliminado=si");
				}

				else
				{
					header("location:v_EstadoCuentas.php?eliminado=no");	
				}







?>