<?php

	
	include("../conexion/conexion.php");
	

	/*Valores que traigo por metodo POST*/
	$lote_id="B0001";
	$impuesto_id="1";
	$prima=200;
	
	if (empty($prima)) {
		/*CODIGO PARA INSERTAR CUENTA PERO SIN METER NADA A TABLA PAGOS*/

	
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



	



	/**************************************************************************************************/


}



  ?>