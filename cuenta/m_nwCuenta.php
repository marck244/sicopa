<?php

	
	include("../conexion/conexion.php");
	

	/*Valores que traigo por metodo POST*/
	$user=TRIM($_POST['user']);
	$cliente=TRIM($_POST['dui']);
	
	$lote_id=TRIM($_POST['cbolote']);
	
	$impuesto_id=TRIM($_POST['cboimpuesto']);

	$num_recibo=TRIM($_POST['recibo']);

	$prima=TRIM($_POST['prima']);

	
	$estado=TRIM($_POST['cboestado']);

	
	$plazodias=TRIM($_POST['plazo']);

	
	
	$fechacreado=date("Y-m-d");

	
	
	

	if (empty($prima)) {
		
		/*CODIGO PARA INSERTAR CUENTA PERO SIN METER NADA A TABLA PAGOS*/
	$sqlcuenta="INSERT INTO cuenta(CLIENTE_ID,IMPUESTO_ID,CUENTA_ESTADOS_ID,LOTE_ID,CUENTA_FECHA_CREADO,CUENTA_PLAZO) VALUES ('$cliente','$impuesto_id','$estado','$lote_id','$fechacreado','$plazodias')";
	$querycuenta=$conn->query($sqlcuenta);
	$query00=$conn->query("UPDATE lote SET LOTE_ESTADO='PAGANDO' WHERE LOTE_ID='$lote_id'");

	$query0=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$cliente'");
	$row=$query0->fetch_assoc();
	$nombre=$row['CLIENTE_NOMBRE']." ".$row['CLIENTE_APELLIDO'];
	$fechabitacora=date("Y-m-d H:i:s");
	$tabla="Cuenta";
	$actividad="Se creo una cuenta sin entrada de prima a nombre de el cliente ".$nombre." con numero de Dui No: ".$cliente." al lote ".$lote_id."";
	$ip=$_SERVER['REMOTE_ADDR'];

	if($querycuenta > 0)
		
		{
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			
			header("location: v_nwCuenta.php?guardado=si");
		}
		else
		{			
		
				header("location: v_nwCuenta.php?guardado=no");
		}
	
	}
	else
	{
		
	/*Consultas a Tablas de Base de datos*/

	$sqllote="SELECT LOTE_ID,LOTE_PRECIO FROM lote WHERE LOTE_ID='$lote_id'";
	$querylote=$conn->query($sqllote);

	$rowlote=$querylote->fetch_assoc();


	$sql_iva_y_interes="SELECT IMPUESTO_ID,IMPUESTO_INTERES,IMPUESTO_IVA FROM impuesto WHERE IMPUESTO_ID='$impuesto_id'";
	$query_iva_y_interes=$conn->query($sql_iva_y_interes);

	$row_iva_y_interes=$query_iva_y_interes->fetch_assoc();

	/***********************************************************/

	/***********************VARIABLES A OCUPAR*********************************/
	
	$preciolote=$rowlote['LOTE_PRECIO'];
	$iva=$row_iva_y_interes['IMPUESTO_IVA'];
	$interes_anual=$row_iva_y_interes['IMPUESTO_INTERES'];
	$interes_mensual=$interes_anual/12;
	/**************************************************************************/



	/*************************RESULTADOS QUE POSTERIORMENTE SE INSERTARIAN EN LAS TABLAS***************/

	$interes=$preciolote * $interes_mensual;
	$cuenta_pago_capital= (($prima - $interes * 1.13) / 1.13);
	$iva= $prima - $interes - $cuenta_pago_capital;
	
	$sqlcuenta="INSERT INTO cuenta(CLIENTE_ID,IMPUESTO_ID,CUENTA_ESTADOS_ID,LOTE_ID,CUENTA_FECHA_CREADO,CUENTA_PLAZO) VALUES ('$cliente','$impuesto_id','$estado','$lote_id','$fechacreado','$plazodias')";
	$querycuenta=$conn->query($sqlcuenta);
	$query00=$conn->query("UPDATE lote SET LOTE_ESTADO='PAGANDO' WHERE LOTE_ID='$lote_id'");

	$query0=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$cliente'");
	$row=$query0->fetch_assoc();
	$nombre=$row['CLIENTE_NOMBRE']." ".$row['CLIENTE_APELLIDO'];
	$fechabitacora=date("Y-m-d H:i:s");
	$tabla="Cuenta";
	$actividad="Se creo una cuenta con una entrada de prima de $ ".$prima." a nombre de el cliente ".$nombre." con numero de Dui No: ".$cliente." al lote ".$lote_id."";
	$ip=$_SERVER['REMOTE_ADDR'];

	
	
	if($querycuenta > 0)
		
		{
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			$sql_select_cuenta="SELECT CUENTA_ID FROM cuenta ORDER BY CUENTA_ID ASC LIMIT 1";
			$query_select_cuenta=$conn->query($sql_select_cuenta);
			$row_select_cuenta=$query_select_cuenta->fetch_assoc();
			$id_cuenta=$row_select_cuenta['CUENTA_ID'];
			$fechacreadoconminutos=date("Y-m-d H:i:s");
			$sql="INSERT INTO cuenta_pagos(CUENTA_ID,CUENTA_PAGOS_FECHA,CUENTA_PAGOS_NUMRECIBO,CUENTA_PAGOS_INTERES,CUENTA_PAGOS_IVA,CUENTA_PAGOS_CAPITAL,CUENTA_PAGOS_DESCRIPCION) VALUES('$id_cuenta','$fechacreadoconminutos','$num_recibo','$interes','$iva','$cuenta_pago_capital','Exito')";
			$query=$conn->query($sql);
			
			header("location: v_nwCuenta.php?guardado=si");
		}
		else
		{	
				
				header("location: v_nwCuenta.php?guardado=no");
		}



	/**************************************************************************************************/


}



  ?>