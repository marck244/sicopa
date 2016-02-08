<?php
	
	include("../conexion/conexion.php");

		
		
		$dui = TRIM($_POST["dui"]);
		$impuesto=TRIM($_POST["cboimpuesto"]);
		$estado=TRIM($_POST["cboestado"]);
		$lotificacion=TRIM($_POST["cbolotificacion"]);
		$cbolote=TRIM($_POST["cbolote"]);
		$prima=TRIM($_POST["prima"]);
		$plazo=TRIM($_POST["plazo"]);
		$modificado=date("Y-m-d");


		if (empty($prima)) {

			$query=$conn->query("UPDATE cuenta SET CLIENTE_ID='$dui',IMPUESTO_ID='$impuesto',CUENTA_ESTADOS_ID='$estado',LOTE_ID='$cbolote',CUENTA_FECHA_MODIFICADO='$modificado',CUENTA_PLAZO='$plazo' WHERE CLIENTE_ID='$dui'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upCuenta.php?actualizo=si");
		}
		else
		{
			header("location: v_upCuenta.php?actualizo=no");
		}
			
		}


		else
		{
			
				$query=$conn->query("UPDATE cuenta SET CLIENTE_ID='$dui',IMPUESTO_ID='$impuesto',CUENTA_ESTADOS_ID='$estado',LOTE_ID='$cbolote',CUENTA_FECHA_MODIFICADO='$modificado',CUENTA_PLAZO='$plazo' WHERE CLIENTE_ID='$dui'")
		or die($conn->error);

		
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

	$sql="INSERT INTO cuenta_pagos(CUENTA_ID,CUENTA_PAGOS_FECHA,CUENTA_PAGOS_NUMRECIBO,CUENTA_PAGOS_INTERES,CUENTA_PAGOS_IVA,CUENTA_PAGOS_CAPITAL,CUENTA_PAGOS_DESCRIPCION) VALUES('$id_cuenta','$fechacreado','250','$interes','$iva','$cuenta_pago_capital','Exito')";
	$query1=$conn->query($sql);

		if ($query1 >0) {
			header("location: v_upCuenta.php?actualizo=si");
		}
		else
		{
			header("location: v_upCuenta.php?actualizo=no");
		}


		}

		


  ?>