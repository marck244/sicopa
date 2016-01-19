<?php 
	include("../conexion/conexion.php");

	$busqueda=str_replace("-","",$_POST["busqueda"]);


	$query=$conn->query("SELECT CUENTA_ID,CLIENTE_ID,IMPUESTO_ID,CUENTA_ESTADOS_ID,LOTE_ID,CUENTA_PLAZO FROM cuenta WHERE CLIENTE_ID='$busqueda' ");

	if ($row=$query->fetch_assoc()){
		$id=$row["CUENTA_ID"];
		$dui=$row["CLIENTE_ID"];
		$plazo=$row["CUENTA_PLAZO"];
	
		
		
		$impuesto_id=$row["IMPUESTO_ID"];
//////////////////////////////////////IDMUNICIPIO
		$cuenta_estados_id=$row["CUENTA_ESTADOS_ID"];
/////////////////////////////////////////////////
		$lote_id=TRIM($row["LOTE_ID"]);
	
		
		$query1=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_ID = '$impuesto_id' ");
		$row1=$query1->fetch_assoc();
		$nombreimpuesto=$row1["IMPUESTO_DESCRIPCION"];
		
				$query2=$conn->query("SELECT CUENTA_ESTADOS_ID,CUENTA_ESTADOS_NOMBRE FROM cuenta_estados WHERE CUENTA_ESTADOS_ID = '$cuenta_estados_id' ");
		$row2=$query2->fetch_assoc();
		$nombrecuentaestado=$row2["CUENTA_ESTADOS_NOMBRE"];



		$query3=$conn->query("SELECT LOTE_ID,LOTIFICACION_ID FROM lote WHERE LOTE_ID='$lote_id' ");
		$row3=$query3->fetch_assoc();
		$nombrelote=$row3["LOTE_ID"];

		$lotificacion_id=$row3["LOTIFICACION_ID"];

		$query5=$conn->query("SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID='$lotificacion_id' ");
		$row5=$query5->fetch_assoc();

		$lotificacion_nombre=$row5["LOTIFICACION_NOMBRE"];


		$query4=$conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui' ");
		$row4=$query4->fetch_assoc();

		$nombrecliente= $row4["CLIENTE_NOMBRE"]." ".$row4["CLIENTE_APELLIDO"];

		

		header("location: v_upCuenta.php?dui=$dui&cuenta=$id&nombrecliente=$nombrecliente&impuesto_id=$impuesto_id&impuesto_nombre=$nombreimpuesto&cuenta_estados_id=$cuenta_estados_id&cuenta_estados_nombre=$nombrecuentaestado&lotificacion_id=$lotificacion_id&lotificacion_nombre=$lotificacion_nombre&lote_id=$lote_id&plazo=$plazo");
		

	}

	else
	{
		header("location: v_upCuenta.php?vacio=si");
	}
















 ?>