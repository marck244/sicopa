<?php
	
	include("../conexion/conexion.php");

		$dui =TRIM($_POST["duicliente"]);

		$id=TRIM($_POST["id"]);
		
		
		$impuesto=TRIM($_POST["cboimpuesto"]);
		$estado=TRIM($_POST["cboestado"]);
		$lotificacion=TRIM($_POST["cbolotificacion"]);
		$cbolote=TRIM($_POST["cbolote"]);
		$prima=TRIM($_POST["prima"]);
		$plazo=TRIM($_POST["plazo"]);
		$modificado=date("Y-m-d");
		$user=TRIM($_POST["user"]);
		

		$num_recibo=TRIM($_POST['recibo']);
		

		$query1=$conn->query("SELECT LOTE_ID FROM cuenta WHERE CUENTA_ID='$id'");
		$row1=$query1->fetch_assoc();
		$loteantiguo=$row1['LOTE_ID'];

		if ($loteantiguo != $cbolote) {
			$query2=$conn->query("UPDATE lote SET LOTE_ESTADO='LIBRE' WHERE LOTE_ID='$loteantiguo'");
			$query3=$conn->query("UPDATE lote SET LOTE_ESTADO='PAGANDO' WHERE LOTE_ID='$cbolote'");
		}


		if (empty($prima)) {

			$query12=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'");
	$rowi=$query12->fetch_assoc();
	$nombre=$rowi['CLIENTE_NOMBRE']." ".$rowi['CLIENTE_APELLIDO'];
	
	$fechabitacora=date("Y-m-d H:i:s");
	
	$tabla="Cuenta";
	$actividad="Se modifico una cuenta sin entrada de prima a nombre de el cliente ".$nombre." con numero de Dui No: ".$dui."";
	
	$ip=$_SERVER['REMOTE_ADDR'];

			$query=$conn->query("UPDATE cuenta SET IMPUESTO_ID='$impuesto',CUENTA_ESTADOS_ID='$estado',LOTE_ID='$cbolote',CUENTA_FECHA_MODIFICADO='$modificado',CUENTA_PLAZO='$plazo' WHERE CUENTA_ID='$id'")
		or die($conn->error);
		

		if ($query >0) {
			
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_upCuenta.php?actualizo=si");
		}
		else
		{
			header("location: v_upCuenta.php?actualizo=no");
		}
			
		}


		else
		{
			
				$query=$conn->query("UPDATE cuenta SET IMPUESTO_ID='$impuesto',CUENTA_ESTADOS_ID='$estado',LOTE_ID='$cbolote',CUENTA_FECHA_MODIFICADO='$modificado',CUENTA_PLAZO='$plazo' WHERE CUENTA_ID='$id'") or die($conn->error);

		
	$sqllote="SELECT LOTE_ID,LOTE_PRECIO FROM lote WHERE LOTE_ID='$cbolote'";
	$querylote=$conn->query($sqllote);

	$rowlote=$querylote->fetch_assoc();


	$sql_iva_y_interes="SELECT IMPUESTO_ID,IMPUESTO_INTERES,IMPUESTO_IVA FROM impuesto WHERE IMPUESTO_ID='$impuesto'";
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

	$sql_select_cuenta="SELECT CUENTA_ID,CLIENTE_ID FROM cuenta WHERE CLIENTE_ID='$dui'";
	$query_select_cuenta=$conn->query($sql_select_cuenta);
	$row_select_cuenta=$query_select_cuenta->fetch_assoc();
	$id_cuenta=$row_select_cuenta['CUENTA_ID'];

	$query0=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'");
	$row=$query0->fetch_assoc();
	$nombre=$row['CLIENTE_NOMBRE']." ".$row['CLIENTE_APELLIDO'];
	$fechabitacora=date("Y-m-d H:i:s");
	$tabla="Cuenta";
	$actividad="Se modifico una cuenta con una entrada de prima de $ ".$prima." a nombre de el cliente ".$nombre." con numero de Dui No: ".$dui."";
	$ip=$_SERVER['REMOTE_ADDR'];

	$fechacreadoconminutos=date("Y-m-d H:i:s");


	$sql="INSERT INTO cuenta_pagos(CUENTA_ID,CUENTA_PAGOS_FECHA,CUENTA_PAGOS_NUMRECIBO,CUENTA_PAGOS_INTERES,CUENTA_PAGOS_IVA,CUENTA_PAGOS_CAPITAL,CUENTA_PAGOS_DESCRIPCION) VALUES('$id_cuenta','$fechacreadoconminutos','$num_recibo','$interes','$iva','$cuenta_pago_capital','Exito')";
	$query1=$conn->query($sql);

		if ($query1 >0) {
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_upCuenta.php?actualizo=si");
		}
		else
		{
			header("location: v_upCuenta.php?actualizo=no");
		}


		}

		


  ?>